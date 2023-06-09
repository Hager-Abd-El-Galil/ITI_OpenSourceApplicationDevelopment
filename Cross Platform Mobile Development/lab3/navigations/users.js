import { createNativeStackNavigator } from "@react-navigation/native-stack";
import React from "react";
import routes from "../common/routes";
import UserDetails from "../screens/details";
import AllUsers from "../screens/users";

const Users = () => {
  const stack = createNativeStackNavigator();

  return (
    <stack.Navigator>
      <stack.Screen name={routes.users} component={AllUsers} />
      <stack.Screen name={routes.details} component={UserDetails} />
    </stack.Navigator>
  );
};

export default Users;