class CreateProducts < ActiveRecord::Migration[7.0]
  def change
    create_table :products do |t|
      t.string :name
      t.string :image
      t.string :price
      t.string :description
      t.references :user

      t.timestamps
    end
  end
end
