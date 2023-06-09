import { StyleSheet } from "react-native";
export default StyleSheet.create({
  container: {
    marginTop: Platform.OS === "android" ? 50 : 0,
    height: "100%",
    marginHorizontal: 10,
  },

  // Contacts Screen Style
  contactsHeader: {
    marginTop:3,
    fontSize: 18,
    backgroundColor: "#93a1a1",
    fontWeight: "bold",
    color: "white",
    padding: 7,
  },

  contactsContainer: {
    flex: 1,
    flexDirection: "row",
    paddingVertical: 6,
    paddingHorizontal: 6
  },

  contactsImage: {
    width: 32,
    height: 32,
    borderRadius: 50,
  },

  contactsItem: {
    marginLeft: 5,
    marginTop: 2,
    padding: 5,
  },

  //  Users Screen Style
  usersContainer: {
    flex: 1,
    backgroundColor: "#fff",
    padding: 12
  },

  searchContainer: {
    width: "100%",
    height: 30,
    borderWidth: 1,
    borderColor: "#ccc",
    borderRadius: 15,
    marginTop: 10,
    paddingLeft: 10,
    marginBottom: 10
  },

  usersList: {
    width: "100%",
    marginTop: 10,
  },

  user: {
    flexDirection: "row",
    alignItems: "center",
    justifyContent: "space-between",
    backgroundColor: "#eee",
    borderWidth: 1,
    borderColor: "#ccc",
    borderRadius: 5,
    gap: 10,
    padding: 10,
    marginBottom: 10,
  },

  userText: {
    flex: 1,
    marginRight: 10,
  },

  // User Details Screen
  usersDetailsContainer: {
    width: "100%",
    flexDirection: "column",
    alignItems: "center",
    marginTop: 150,
    borderWidth: 1,
    borderColor: "#ccc",
    backgroundColor: "white",
    padding: 10
  },

  userImage: {
    width: 200,
    height: 200
  },

  usersDetails: {
    fontSize: 16,
    textAlign:"center"
  },

  // Todo List Screen
  todoListContainer: {
    marginTop: 30,
    padding: 15
  }, 

  inputRow: {
    flexDirection: "row",
    alignItems: "center",
    justifyContent: "space-between",
    marginBottom: 10
  },

  addTaskInput: {
    width: "83%",
    height: 40,
    borderWidth: 1,
    borderColor: "#ccc",
    borderRadius: 5,
    padding: 10,
  },

  list: {
    width: "100%",
    marginTop: 20,
  },

  todo: {
    flexDirection: "row",
    alignItems: "center",
    justifyContent: "space-between",
    borderWidth: 1,
    borderColor: "#ccc",
    borderRadius: 5,
    gap: 10,
    padding: 10,
    marginBottom: 10,
  },

  todoText: {
    flex: 1,
    marginRight: 10,
  },

  inputError: {
    textAlign: "left",
    fontWeight: "bold",
    marginBottom: 10,
    color: "red",
  },

  counter: {
    marginTop: 10,
    fontWeight: "bold",
    fontSize: 18,
    color: "#839496",
    fontStyle: "italic",
    textAlign: "center"
  },
  
});
