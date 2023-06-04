import React from 'react';
import {View, StyleSheet,Text} from 'react-native';
import styles from './BoxStyles';
const Box = (props) => {
    const {colorName,hexCode}=props;
    return (
        <View  style={[styles.boxStyle,{backgroundColor:hexCode}]}>
        <Text style={styles.textStyle}>{colorName} {hexCode}</Text>
      </View>
    );
}



export default Box;
