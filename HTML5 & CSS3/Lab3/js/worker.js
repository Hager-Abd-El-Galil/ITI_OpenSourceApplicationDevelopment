this.onmessage = function(){
    var sum = 0;
    for(var i=0;i<=100000;i++){
        sum += i;
        console.log(sum);
    }
    this.postMessage(sum);
}