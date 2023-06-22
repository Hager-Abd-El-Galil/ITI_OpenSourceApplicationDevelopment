require "test_helper"

class ProductControllerTest < ActionDispatch::IntegrationTest

  test 'can create product' do
    user1 = User.find_by_id(id=1)
    product = Product.create(name:"book", image:"http", price:20, description:"description", user:user1)
    assert product.save, "not saved"
  end

  test 'can update product' do
    user1 = User.find_by_id(id=1)
    product = Product.create(name:"book", image:"http", price:20, description:"description", user:user1)

    product.save


    assert product.update(name:"book2", image:"http", price:20, description:"description", user:user1), "not updated"

  end

  test 'can delete product' do

    user1 = User.find_by_id(id=1)
    product = Product.create(name:"book", image:"http", price:20, description:"description", user:user1)

    product.save

    assert product.delete, "not deleted"

  end

end
