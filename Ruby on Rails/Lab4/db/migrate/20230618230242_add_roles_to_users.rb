class AddRolesToUsers < ActiveRecord::Migration[7.0]
  def change
    add_column :users, :admin_role, :boolean, default: true
    add_column :users, :superadmin_role, :boolean, default: false
  end
end
