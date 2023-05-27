import { StatusBar } from 'expo-status-bar';
import { StyleSheet, Text, View, SafeAreaView, Image, ScrollView } from 'react-native';

export default function App() {
  return (
    <SafeAreaView>
      <Text style={{fontSize:25,textAlign:'center',marginTop:50}}>React Native Lab1</Text>
      <ScrollView horizontal>
        <Image source={require('./assets/image1.jpg')} style={styles.Image}></Image>
        <Image source={require('./assets/image2.jpg')} style={styles.Image}></Image>
        <Image source={require('./assets/image3.jpg')} style={styles.Image}></Image>
      </ScrollView>
    </SafeAreaView>
  );
}

const styles = StyleSheet.create({
  container: {
    flex: 1,
    backgroundColor: '#fff',
    alignItems: 'center',
    justifyContent: 'center',
  },
  Image: {
    height: 720,
    width: 400
  }
});
