import React, { useState } from "react";
import { View, TextInput } from "react-native";
import UsersList from "../components/usersList";
import styles from "../style/styles";

export default function AllUsers({ navigation }) {
  const [search, setSearch] = useState("");
  const handleSearch = (text) => {
    setSearch(text);
  };

  return (
    <View style={styles.usersContainer}>
      <TextInput
        style={styles.searchContainer}
        placeholder="search"
        value={search}
        onChangeText={(text) => handleSearch(text)}
      />
      <View style={styles.usersList}>
        <UsersList search={search}></UsersList>
      </View>
    </View>
  );
}



