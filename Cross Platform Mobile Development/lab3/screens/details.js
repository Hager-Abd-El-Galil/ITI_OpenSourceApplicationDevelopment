import { useRoute } from "@react-navigation/native";
import { View, Text, Image } from "react-native";
import styles from "../style/styles";

const Details = () => {
  const { params } = useRoute();
  const image = params.image;

  return (
    <View style={styles.usersDetailsContainer}>
      {params && <Image source={params.image} style={styles.userImage} />}
      {params && <Text style={styles.usersDetails}>Name: {params.name}</Text>}
      {params && (
        <Text style={styles.usersDetails}>Username: {params.username}</Text>
      )}
      {params && <Text style={styles.usersDetails}>Email: {params.email}</Text>}
    </View>
  );
};

export default Details;

