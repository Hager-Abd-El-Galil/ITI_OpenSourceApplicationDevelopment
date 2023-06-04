import {StyleSheet} from "react-native"
export default StyleSheet.create( {
    container: {
      marginTop: Platform.OS === "android" ? 40 : 0,
      height: "100%",
      marginHorizontal:10
    },
    
    header:{
        fontSize:19,
        fontWeight:'bold'
    },
    largeBoxStyle: {
      backgroundColor: "yellow",
      width: 500,
      height: 500,
      // ,zIndex:1
    },
    miniBox: {
      backgroundColor: "green",
      width: 100,
      height: 100,
      position: "absolute",
      bottom: 50,
      left: 50,
      //   margin:50,
      marginHorizontal:20,
      marginVertical:60
    },
  });