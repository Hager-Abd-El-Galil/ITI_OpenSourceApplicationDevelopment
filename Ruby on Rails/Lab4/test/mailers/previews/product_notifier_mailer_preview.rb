# Preview all emails at http://localhost:3000/rails/mailers/product_notifier_mailer
class ProductNotifierMailerPreview < ActionMailer::Preview
  def new_product_mail
    ProductNotifierMailer.new_product_mail
  end
end
