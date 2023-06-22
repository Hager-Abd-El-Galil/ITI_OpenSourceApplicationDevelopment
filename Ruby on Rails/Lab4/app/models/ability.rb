class Ability
  include CanCan::Ability

  def initialize(user)
    user ||= User.new 

    if user.superadmin_role?
      can :manage, :all
      can :manage, :dashboard   
    end

    if user.admin_role?

      can :read, User, :id => user.id

    end
  end
end