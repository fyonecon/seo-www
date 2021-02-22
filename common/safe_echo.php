<?php

/*
 * 页面最后的安全验证
 * */

// 生成静态html文件，获取并写入内容到新的html文件
if ($html_static_state == true){
    $_html_static_out = ob_get_contents(); // 获取缓冲区的内容
    // ob_end_flush(); // 输出全部静态内容到浏览器并结束缓存
    ob_end_clean(); // 关闭输出缓存

    if ($compress_html_state == true){
        $html_static_out = compress_html_dom($_html_static_out); // 压缩页面
    }else{
        $html_static_out = $_html_static_out; // 原生页面排布显示
    }

    // 保存已生成的html文件
    $html_file = fopen($html_static_file, "w"); // a继续写入，w覆盖写入
    if (!$html_file) {
        write_log("msg：文件夹无法写入此静态文件。IP：{$_ip}。name：{$html_url}。URI：{$_uri}。OS：{$the_os}", 'safe_check#22', 'save_html-'); // 记录日志

        exit('参数不在白名单则（write），无法保存对应静态文件：time_html='.$nav_name);
    }else{
        fwrite($html_file, $html_static_out); // 写入文件
        fclose($html_file); // 关闭文件
        // 输出刚生的html并已压缩的文件
        echo $html_static_out;
        exit();
    }
}else{ // 整个框架运行皆终于此
    exit();
}