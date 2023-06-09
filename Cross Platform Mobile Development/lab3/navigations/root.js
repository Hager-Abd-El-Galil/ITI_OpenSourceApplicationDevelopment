import React, { createContext } from 'react';
import routes from '../common/routes';
import { createMaterialTopTabNavigator } from '@react-navigation/material-top-tabs';
import Contacts from "../screens/contacts";
import Todo from "../screens/todo";
import Users from "./users";
import styles from "../style/styles";

export const usersContext = createContext();
const Root = () => {
    const Tab = createMaterialTopTabNavigator();

    return (
      <Tab.Navigator style={styles.container}>
        <Tab.Screen name={routes.contacts} component={Contacts} />
        <Tab.Screen name="users" component={Users} />
        <Tab.Screen name={routes.todo} component={Todo} />
      </Tab.Navigator>
    );
};

export default Root;
