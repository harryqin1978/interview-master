<?php

/**
 * @author koma
 * @todo   PHP无限极分类
 * 字段：id, pid, catename, cateorder, addtime
 */

$cn = mysql_connect('localhost', 'root', '123456') or die(mysql_error());
mysql_select_db('uc', $cn) or die(mysql_error());
mysql_query('set names utf8');

/**
 * 从顶层逐级向下获取子类
 * @param number $pid
 * @param array $lists
 * @param number $deep
 * @return array
 */
function getLists($pid = 0, &$lists = array(), $deep = 0) {
    $sql = 'SELECT * FROM category WHERE pid='.$pid;
    $res = mysql_query($sql);
    while ( ($row = mysql_fetch_assoc($res)) !== FALSE ) {
        $row['catename'] = str_repeat('&nbsp;', $deep*4).'|---'.$row['catename'].' (Level '.$deep.')';
        $lists[] = $row;
        getLists($row['id'], $lists, ++$deep); //进入子类之前深度+1
        --$deep; //从子类退出之后深度-1
    }
    return $lists;
}

function displayLists($pid = 0, $selectid = 1) {
    $result = getLists($pid);
    $str = '<select>';
    foreach ( $result as $item ) {
        $selected = "";
        if ( $selectid == $item['id'] ) {
            $selected = 'selected';
        }
        $str .= '<option '.$selected.'>'.$item['catename'].'</option>';
    }
    return $str .= '</select>';
}

/**
 * 从子类开始逐级向上获取其父类
 * @param number $cid
 * @param array $category
 * @return array:
 */ function getCategory($cid, &$category = array()) {
    $sql = 'SELECT * FROM category WHERE id='.$cid.' LIMIT 1';
    $result = mysql_query($sql);
    $row = mysql_fetch_assoc($result);
    if ( $row ) {
        $category[] = $row;
        getCategory($row['pid'], $category);
    }
    krsort($category); //逆序,达到从父类到子类的效果     return $category;
}

function displayCategory($cid) {
    $result = getCategory($cid);
    $str = "";
    if ($result) {
        foreach ($result as $item ) {
            $str .= '<a href="'.$item['id'].'">'.$item['catename'].'</a>>';
        }
    }
    return substr($str, 0, strlen($str) - 1);
}

echo displayLists(0, 3);
echo displayCategory(13);