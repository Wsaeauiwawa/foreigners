function getDependent() {
    var dependent = document.getElementById('dependents').value;
    //var form = document.getElementById("form").style.display;
    if(dependent == 'Yes'){
        document.getElementById("form").style.display ='block';
    } else {
        document.getElementById("form").style.display ='none';
    }
    
}