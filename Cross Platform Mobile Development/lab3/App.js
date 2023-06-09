import { NavigationContainer } from "@react-navigation/native";
import Root from "./navigations/root";
import { createMaterialTopTabNavigator } from "@react-navigation/material-top-tabs";

export default function App() {
  const Tab = createMaterialTopTabNavigator();
  return (
    <NavigationContainer>
      <Root></Root>
    </NavigationContainer>
  );
}

