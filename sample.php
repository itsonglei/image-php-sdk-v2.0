<?php

require_once __DIR__ . '/index.php';
use QcloudImage\CIClient;

$appid = 'YOUR_APPID';
$secretId = 'YOUR_SECRETID';
$secretKey = 'YOUR_SECRETKEY';
$bucket = 'YOUR_BUCKET';

$client = new CIClient($appid, $secretId, $secretKey, $bucket);
$client->setTimeout(30);

// 选择服务器域名, 推荐使用新域名 useNewDomain ( recognition.image.myqcloud.com )
// 
// 如果你:
//      1.正在使用人脸识别系列功能( https://cloud.tencent.com/product/FaceRecognition/developer )
//      2.并且是通过旧域名访问的
// 那么: 请继续使用旧域名
$client->useNewDomain();
//图片鉴黄
//单个或多个图片Url
var_dump ($client->pornDetect(array('urls'=>array('YOUR URL A','YOUR URL B'))));
//单个或多个图片File
var_dump ($client->pornDetect(array('files'=>array('F:\pic\你好.jpg','G:\pic\test2.jpg'))));

//图片标签
//单个图片url
var_dump ($client->tagDetect(array('url'=>'YOUR URL')));
//单个图片file
var_dump ($client->tagDetect(array('file'=>'G:\pic\hot1.jpg')));
//单个图片内容
var_dump ($client->tagDetect(array('buffer'=>file_get_contents('G:\pic\hot1.jpg'))));

//身份证识别
//单个或多个图片Url,识别身份证正面
var_dump ($client->idcardDetect(array('urls'=>array('YOUR URL A', 'YOUR URL B')), 0));
//单个或多个图片file,识别身份证正面
var_dump ($client->idcardDetect(array('files'=>array('F:\pic\id6_zheng.jpg', 'F:\pic\id2_zheng.jpg')), 0));
//单个或多个图片内容,识别身份证正面
var_dump ($client->idcardDetect(array('buffers'=>array(file_get_contents('F:\pic\id6_zheng.jpg'), file_get_contents('F:\pic\id2_zheng.jpg'))), 0));

//单个或多个图片Url,识别身份证反面
var_dump ($client->idcardDetect(array('urls'=>array('YOUR URL A', 'YOUR URL B')), 1));
//单个或多个图片file,识别身份证反面
var_dump ($client->idcardDetect(array('files'=>array('F:\pic\id5_fan.jpg', 'F:\pic\id7_fan.png')), 1));
//单个或多个图片内容,识别身份证反面
var_dump ($client->idcardDetect(array('buffers'=>array(file_get_contents('F:\pic\id5_fan.jpg'), file_get_contents('F:\pic\id7_fan.png'))), 1));

//名片识别
//单个或多个图片Url
var_dump ($client->namecardDetect(array('urls'=>array('YOUR URL A', 'YOUR URL B')), 0));
//单个或多个图片file,
var_dump ($client->namecardDetect(array('files'=>array('F:\pic\r.jpg', 'F:\pic\name2.jpg')), 1));
//单个或多个图片内容
var_dump ($client->namecardDetect(array('buffers'=>array(file_get_contents('F:\pic\name1.jpg'), file_get_contents('F:\pic\name2.jpg'))), 0));

//名片识别v2
//单个或多个图片Url
var_dump ($client->namecardV2Detect(array('urls'=>array('YOUR URL A', 'YOUR URL B'))));
//单个或多个图片file
var_dump ($client->namecardV2Detect(array('files'=>array('F:\pic\jiashizheng.jpg', 'F:\pic\yingyezhizhao.jpeg'))));
//单个或多个图片内容
var_dump ($client->namecardV2Detect(array('buffers'=>array(file_get_contents('F:\pic\face1.jpg'), file_get_contents('F:\pic\face10.jpg')))));

//行驶证驾驶证识别
//单个或多个图片file
var_dump ($client->drivingLicence(array('file'=>'F:\pic\r2.jpg'),1));
//使用buffer
var_dump ($client->drivingLicence(array('buffer'=>file_get_contents('F:\pic\r2.jpg')),1));
//单个或多个图片Url
var_dump ($client->drivingLicence(array('url'=>'YOUR URL'), 0));

//车牌号识别
//单个图片file
var_dump ($client->plate(array('file'=>'F:\pic\chepaihao.jpg')));
//单个图片的URL
var_dump ($client->plate(array('url'=>'YOUR URL')));

//银行卡识别
//单个图片file
var_dump ($client->bankcard(array('file'=>'F:\pic\yinhangka.jpg')));
//使用buffer
var_dump ($client->bankcard(array('buffer'=>file_get_contents('F:\pic\yinhangka.jpg'))));
//单个图片的URL
var_dump ($client->bankcard(array('url'=>'YOUR URL')));

//营业执照识别
//单个图片识别
var_dump ($client->bizlicense(array('file'=>'F:\pic\yingyezhizhao.jpeg')));
//使用buffer
var_dump ($client->bizlicense(array('buffer'=>file_get_contents('F:\pic\yingyezhizhao.jpeg'))));
//单个图片的URL
var_dump ($client->bankcard(array('url'=>'YOUR URL')));

//通用印刷体的识别
//单个图片的识别
var_dump ($client->general(array('file'=>'F:\pic\geneal2.PNG')));
//单个图片的URL
var_dump ($client->general(array('url'=>'YOUR URL')));

//手写体识别
//单个图片的识别
var_dump ($client->general(array('file'=>'F:\pic\shouxieti.jpg')));
//单个图片的URL
var_dump ($client->general(array('url'=>'YOUR URL')));

//人脸检测
//单个图片Url, mode:1为检测最大的人脸 , 0为检测所有人脸
var_dump ($client->faceDetect(array('url'=>'YOUR URL'), 1));
//单个图片file,mode:1为检测最大的人脸 , 0为检测所有人脸
var_dump ($client->faceDetect(array('file'=>'F:\pic\face1.jpg'),0));
//单个图片内容,mode:1为检测最大的人脸 , 0为检测所有人脸
var_dump ($client->faceDetect(array('buffer'=>file_get_contents('F:\pic\face1.jpg')), 1));

//五官定位
//单个图片Url,检测最大的人脸
var_dump ($client->faceShape(array('url'=>'YOUR URL'),1));
//单个图片Url,检测所有人脸
var_dump ($client->faceShape(array('file'=>'F:\pic\face1.jpg'),0));
//单个图片Url,检测所有人脸
var_dump ($client->faceShape(array('buffer'=>file_get_contents('F:\pic\face1.jpg')), 1));


//创建一个Person，并将Person放置到group_ids指定的组当中, 使用图片url
var_dump ($client->faceNewPerson('person1111', array('group11',), array('url'=>'YOUR URL'), 'xiaoxin'));
//创建一个Person，并将Person放置到group_ids指定的组当中, 使用图片file
var_dump ($client->faceNewPerson('person2111', array('group11',), array('file'=>'F:\pic\hot1.jpg')));
//创建一个Person，并将Person放置到group_ids指定的组当中, 使用图片内容
var_dump ($client->faceNewPerson('person3111', array('group11',), array('buffer'=>file_get_contents('F:\pic\zhao1.jpg'))));


//增加人脸,将单个或者多个Face的url加入到一个Person中.注意，一个Face只能被加入到一个Person中。 一个Person最多允许包含20个Face
var_dump ($client->faceAddFace('person_one', array('urls'=>array('YOUR URL A','YOUR URL B'))));
//增加人脸,将单个或者多个Face的file加入到一个Person中.注意，一个Face只能被加入到一个Person中。 一个Person最多允许包含20个Face
var_dump ($client->faceAddFace('person_two', array('files'=>array('F:\pic\yang.jpg','F:\pic\yang2.jpg'))));
//增加人脸,将单个或者多个Face的文件内容加入到一个Person中.注意，一个Face只能被加入到一个Person中。 一个Person最多允许包含20个Face
var_dump ($client->faceAddFace('person_three', array('buffers'=>array(file_get_contents('F:\pic\yang.jpg'),file_get_contents('F:\pic\yang2.jpg')))));

//删除人脸
var_dump ($client->faceDelFace('person_one', array('one',)));
//设置信息
var_dump ($client->faceSetInfo('person_one', 'fanbing'));
//获取信息
var_dump ($client->faceGetInfo('person_one'));
//获取组列表
var_dump ($client->faceGetGroupIds());
//获取人列表
var_dump ($client->faceGetPersonIds('group1'));
//获取人脸列表
var_dump ($client->faceGetFaceIds('person_one'));
//获取人脸信息
var_dump ($client->faceGetFaceInfo('1704147773393235686'));
//删除个人
var_dump ($client->faceDelPerson('person_one'));

//人脸验证
//单个图片Url
var_dump ($client->faceVerify('person1', array('url'=>'YOUR URL')));
//单个图片file
var_dump ($client->faceVerify('person3111', array('file'=>'F:\pic\yang3.jpg')));
//单个图片内容
var_dump ($client->faceVerify('person3111', array('buffer'=>file_get_contents('F:\pic\yang3.jpg'))));

//人脸检索
//单个文件url
var_dump ($client->faceIdentify('group1', array('url'=>'YOUR URL')));
//单个文件file
var_dump ($client->faceIdentify('group11', array('file'=>'F:\pic\yang3.jpg')));
//单个文件内容
var_dump ($client->faceIdentify('group11', array('buffer'=>file_get_contents('F:\pic\yang3.jpg'))));

//人脸对比
//两个对比图片的文件url
var_dump ($client->faceCompare(array('url'=>"YOUR URL A"), array('url'=>'YOUR URL B')));
//两个对比图片的文件file
var_dump ($client->faceCompare(array('file'=>'F:\pic\yang.jpg'), array('file'=>'F:\pic\yang2.jpg')));
//两个对比图片的文件内容
var_dump ($client->faceCompare( array('buffer'=>file_get_contents('F:\pic\yang.jpg')), array('buffer'=>file_get_contents('F:\pic\yang3.jpg'))));


//身份证识别对比
//身份证url
var_dump ($client->faceIdCardCompare('ID CARD NUM', 'NAME', array('url'=>'YOUR URL')));
//身份证文件file
var_dump ($client->faceIdCardCompare('ID CARD NUM', 'NAME',  array('file'=>'F:\pic\idcard.jpg')));
//身份证文件内容
var_dump ($client->faceIdCardCompare('ID CARD NUM', 'NAME',  array('buffer'=>file_get_contents('F:\pic\idcard.jpg'))));


//人脸核身
//活体检测第一步：获取唇语（验证码）
$obj = $client->faceLiveGetFour();
var_dump ($obj);
$faceObj = json_decode($obj, true);
var_dump ($faceObj);
$validate_data = '';
if ($faceObj && isset($faceObj['data']['validate_data'])) {
    $validate_data = $faceObj['data']['validate_data'];
}
var_dump ($validate_data);

//活体检测第二步：检测
var_dump ($client->faceLiveDetectFour($validate_data, array('file'=>'F:\pic\ZOE_0171.mp4'), False, array('F:\pic\idcard.jpg')));
//活体检测第二步：检测--对比指定身份信息
var_dump ($client->faceIdCardLiveDetectFour($validate_data, array('file'=>'F:\pic\ZOE_0171.mp4'), '330782198802084329', '季锦锦'));

//人脸静态活体检测
//使用image的检测
var_dump ($client->liveDetectPicture(array('file'=>'F:\pic\face1.jpg'),'123456'));
//使用buffer
var_dump ($client->liveDetectPicture(array('buffer'=>file_get_contents('F:\pic\face1.jpg')),'123456'));
//单个图片的URL
var_dump ($client->liveDetectPicture(array('url'=>'YOUR URL'),'123456'));

//多脸检索
//使用 image 和 group_id 的请求
var_dump ($client->multidentify(array('file'=>'F:\pic\r2.jpg'), array('group_id'=>'tencent')));
//使用 image 和 group_ids 的请求
var_dump ($client->multidentify(array('file'=>'F:\pic\face1.jpg'), array('group_ids'=>array("tencent","qq"))));
//使用 url 和 group_id 的请求
var_dump ($client->multidentify(array('url'=>'YOUR URL'), array('group_id'=>'tencent')));
//使用 url 和 group_ids 的请求
var_dump ($client->multidentify(array('url'=>'YOUR URL') , array('group_ids'=>array("tencent","qq"))));
