/*安全校验与老浏览器检测*/
/*本check.js文件可有可无*/

// 检测浏览器是否支持ES语法
(function () {

    try{
        let check = 1;
        new Promise(function(resolve, reject) {
            if (check === 1){
                check++;
                resolve();
            } else {
                check--;
                reject();
            }
        }).then(function () {
            const map = new Map([
                ["check", check],
            ]);
            map.get("check");
            console.log("ES6 YES");
        });

    }catch (e) {
        alert("浏览器版本不支持ES6语法，请使用最新版的Chrome、火狐、Edge、360浏览器、360急速浏览器、搜狗浏览器、Yandex浏览器、欧朋浏览器、遨游浏览器、苹果浏览器等浏览器。或者，可以手动切换浏览器内核，切换到极速内核（Chrome内核）。对于ES6语法，2016年及其之前的PC浏览器、手机系统才支持（其中IE11及其以下不支持，安卓5.0及其以下不支持，iOS9.x及其以下不支持，chrome49之前不支持，Edge15之前不支持）");
        window.location.href = "https://www.baidu.com/s?wd=%E6%94%AF%E6%8C%81es6%E7%9A%84%E6%B5%8F%E8%A7%88%E5%99%A8";
    }

})();


