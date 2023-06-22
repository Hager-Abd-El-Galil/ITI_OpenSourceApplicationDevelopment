class UsersController < ApplicationController


  def show
    @user = User.find(params[:id])
  end


  def edit
    @user = User.find(params[:id])
  end

  def update
    @user = User.find(params[:id])
    
    if @user.update(user_params)
      redirect_to @user
    else
      render :new, status: :unprocessable_entity 
    end  
  
  end


  private
  def user_params
    params.require(:user).permit(:name, :email)
  end
end
