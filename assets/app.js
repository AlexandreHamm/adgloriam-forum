document.querySelector('.ad-cookies__btns > button').addEventListener('click',function close(){
    document.querySelector('.ad-cookies').style.height = '0';
    cookie = 1;
    setTimeout(function(){
        document.querySelector('.ad-cookies').style.display = 'none';
    }, 300);
});

// if(window.location.pathname.includes('profile')) {
//     let rotate = 0;

//     document.querySelector('.profile_infos > svg').addEventListener('click', function(){
//         if(rotate == 0){
//             document.querySelector('.profile_infos').style.height = '50%';
//             document.querySelector('.profile_infos > svg').style.transform = 'translateX(-50%) rotate(0)';
//             rotate++;
//         }else{
//             document.querySelector('.profile_infos').style.height = '10px';
//             document.querySelector('.profile_infos > svg').style.transform = 'translateX(-50%) rotate(180deg)';
//             rotate = 0;
//         }
//     });
// }