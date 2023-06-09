import React, { useState } from "react";
import { View, Text, Button, FlatList } from "react-native";
import routes from "../common/routes";
import { useNavigation } from "@react-navigation/native";
import styles from "../style/styles";

const UsersList = ({ search }) => {
  const [users, setUsers] = useState([
    {
      id: 1,
      name: "Ahmed Ali",
      username: "Ahmed",
      email: "Ahmed@gmail.com",
      image: require("../assets/avatar/avatar1.jpg"),
      phone: "01124513211"
    },
    {
      id: 2,
      name: "Alaa Hassan",
      username: "Alaa",
      email: "Alaa@gmail.com",
      image: require("../assets/avatar/avatar2.jpg"),
      phone: "01011241412"
    },
    {
      id: 3,
      name: "Karim Ahmed",
      username: "Karim",
      email: "Karim@gmail.com",
      image: require("../assets/avatar/avatar4.jpg"),
      phone: "01008457741"
    },
    {
      id: 4,
      name: "Sama Mohammed",
      username: "Sama",
      email: "Sama@gmail.com",
      image: require("../assets/avatar/avatar3.jpg"),
      phone: "01221212645"
    },
    {
      id: 5,
      name: "Amr Mahmoud",
      username: "Amr",
      email: "Amr@gmail.com",
      image: require("../assets/avatar/avatar1.jpg"),
      phone: "01224243411"
    },
    {
      id: 6,
      name: "Nesma Ahmed",
      username: "Nesma",
      email: "Nesma@gmail.com",
      image: require("../assets/avatar/avatar5.jpg"),
      phone: "01002231212"
    },
  ]);

  const navigation = useNavigation();

  return (
    <>
      <FlatList
        style={styles.usersList}
        data={users.filter((user) => user.name.includes(search))}
        keyExtractor={(item) => item.id.toString()}
        renderItem={({ item }) => (
          <View style={styles.user}>
            <Text style={[styles.userText]}>{item.name}</Text>

            <Button
              title="Show More"
              onPress={() => {
                navigation.navigate(routes.details, item);
              }}
            />
          </View>
        )}
      />
    </>
  );
};
export default UsersList;
