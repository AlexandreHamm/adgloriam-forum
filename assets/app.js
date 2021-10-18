document.querySelector('.ad-cookies__btns > button').addEventListener('click',function close(){
    document.querySelector('.ad-cookies').style.height = '0';
    cookie = 1;
    setTimeout(function(){
        document.querySelector('.ad-cookies').style.display = 'none';
    }, 300);
});