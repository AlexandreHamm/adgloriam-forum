document.querySelector('.ag-cookies__btns > button').addEventListener('click',function close(){
    document.querySelector('.ag-cookies').style.height = '0';
    setTimeout(function(){
        document.querySelector('.ag-cookies').style.display = 'none';
    }, 300);
});