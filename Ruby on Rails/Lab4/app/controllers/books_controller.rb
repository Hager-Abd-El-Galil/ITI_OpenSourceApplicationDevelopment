class BooksController < ApplicationController


  before_action :authenticate_user!

  def index
    @books = book.all
  end
  
  def show
    @book = book.find(params[:id])
  end

  def new 
    @book = book.new

  end

  def create 
    @book = book.new(book_params)
    
    if @book.save
      bookNotifierMailer.new_book_mail.deliver_later
      redirect_to @book
    else
      @book.errors.full_messages
    end  
  end 

  def edit
    @book = book.find(params[:id])
  end

  def update
    @book = book.find(params[:id])
    
    if @book.update(book_params)
      redirect_to @book
    else
      render :new, status: :unprocessable_entity 
    end  
  
  end

  def destroy
    @book = book.find(params[:id])
    @book.destroy

    redirect_to root_path, status: :see_other
  end  

  private
    def book_params
      params.require(:book).permit(:name, :image, :price, :description,:user_id)
    end
end
