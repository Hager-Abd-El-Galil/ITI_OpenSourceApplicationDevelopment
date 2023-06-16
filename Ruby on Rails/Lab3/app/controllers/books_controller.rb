class BooksController < ApplicationController

  http_basic_authenticate_with name: "Hager", password: "Hager1234", except: [:index, :show]

  def index
    @books = Book.all
  end

  def show
    @book = Book.find(params[:id])
  end

  def new
    @book = Book.new
  end

  def create
    @book = Book.new(book_params)
    @book.user_id = User.find_by(name: authenticated_username).id

    if @book.save
      @book.image.attach(params[:book][:image])
      redirect_to @book
    else
      render :new, status: :unprocessable_entity
    end
  end

  def edit
    @book = Book.find(params[:id])
  end

  def update
    @book = Book.find(params[:id])
    if @book.update(book_params)
      if params[:book][:image].present?
        @book.image.attach(params[:book][:image])
      end
      redirect_to @book
    else
      render :edit, status: :unprocessable_entity
    end
  end

  def destroy
    @book = Book.find(params[:id])
    @book.destroy

    redirect_to root_path, status: :see_other
  end

  private
    def book_params
      params.require(:book).permit(:name, :price, :description, :image)
    end

  private
    def authenticated_username
      username, _password = ActionController::HttpAuthentication::Basic::user_name_and_password(request)
      username
    end

end
