import { View, Text, SectionList, Image } from "react-native";
import styles from "../style/styles";

const Contact = () => {
  const allSections = [
    {
      id: "0",
      title: "A",
      data: [
        { id: "0", text: "Ahmed", img: require("../assets/avatar/avatar1.jpg") },
        { id: "1", text: "Ali", img: require("../assets/avatar/avatar4.jpg") },
        { id: "2", text: "Arwa", img: require("../assets/avatar/avatar2.jpg") }
      ]
    },
    {
      id: "1",
      title: "B",
      data: [
        { id: "3", text: "Basma", img: require("../assets/avatar/avatar3.jpg") }
      ]
    },
    {
      id: "2",
      title: "C",
      data: [
        { id: "4", text: "Carolen", img: require("../assets/avatar/avatar5.jpg") }
      ]
    },
    {
      id: "3",
      title: "D",
      data: [
        { id: "5", text: "Dalia", img: require("../assets/avatar/avatar2.jpg") },
        { id: "6", text: "Dina", img: require("../assets/avatar/avatar3.jpg") }
      ]
    },
    {
      id: "4",
      title: "E",
      data: [
        { id: "7", text: "Ebrahim", img: require("../assets/avatar/avatar1.jpg") },
        { id: "8", text: "Eman", img: require("../assets/avatar/avatar5.jpg") },
        { id: "9", text: "Esraa", img: require("../assets/avatar/avatar4.jpg") }
      ]
    },
  ];

  return (
    <View>
      <SectionList
        sections={allSections}
        renderSectionHeader={({ section: { title } }) => (
          <Text style={styles.contactsHeader}>{title}</Text>
        )}
        renderItem={({ item: { text, img } }) => (
          <View
            style={styles.contactsContainer}>
            <Image 
              style={styles.contactsImage}
              source={img}
            />
            <Text style={[styles.contactsItem, { flexGrow: 2 }]}>{text}</Text>
          </View>
        )}
        keyExtractor={(props) => props.id}
      ></SectionList>
    </View>
  );
};

export default Contact;
