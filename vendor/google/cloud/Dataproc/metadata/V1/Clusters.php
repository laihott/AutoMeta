<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/cloud/dataproc/v1/clusters.proto

namespace GPBMetadata\Google\Cloud\Dataproc\V1;

class Clusters
{
    public static $is_initialized = false;

    public static function initOnce() {
        $pool = \Google\Protobuf\Internal\DescriptorPool::getGeneratedPool();

        if (static::$is_initialized == true) {
          return;
        }
        \GPBMetadata\Google\Api\Annotations::initOnce();
        \GPBMetadata\Google\Cloud\Dataproc\V1\Operations::initOnce();
        \GPBMetadata\Google\Longrunning\Operations::initOnce();
        \GPBMetadata\Google\Protobuf\Duration::initOnce();
        \GPBMetadata\Google\Protobuf\FieldMask::initOnce();
        \GPBMetadata\Google\Protobuf\Timestamp::initOnce();
        $pool->internalAddGeneratedFile(hex2bin(
            "0a8f290a27676f6f676c652f636c6f75642f6461746170726f632f76312f" .
            "636c7573746572732e70726f746f1218676f6f676c652e636c6f75642e64" .
            "61746170726f632e76311a29676f6f676c652f636c6f75642f6461746170" .
            "726f632f76312f6f7065726174696f6e732e70726f746f1a23676f6f676c" .
            "652f6c6f6e6772756e6e696e672f6f7065726174696f6e732e70726f746f" .
            "1a1e676f6f676c652f70726f746f6275662f6475726174696f6e2e70726f" .
            "746f1a20676f6f676c652f70726f746f6275662f6669656c645f6d61736b" .
            "2e70726f746f1a1f676f6f676c652f70726f746f6275662f74696d657374" .
            "616d702e70726f746f22a5030a07436c757374657212120a0a70726f6a65" .
            "63745f696418012001280912140a0c636c75737465725f6e616d65180220" .
            "01280912370a06636f6e66696718032001280b32272e676f6f676c652e63" .
            "6c6f75642e6461746170726f632e76312e436c7573746572436f6e666967" .
            "123d0a066c6162656c7318082003280b322d2e676f6f676c652e636c6f75" .
            "642e6461746170726f632e76312e436c75737465722e4c6162656c73456e" .
            "74727912370a0673746174757318042001280b32272e676f6f676c652e63" .
            "6c6f75642e6461746170726f632e76312e436c7573746572537461747573" .
            "123f0a0e7374617475735f686973746f727918072003280b32272e676f6f" .
            "676c652e636c6f75642e6461746170726f632e76312e436c757374657253" .
            "746174757312140a0c636c75737465725f7575696418062001280912390a" .
            "076d65747269637318092001280b32282e676f6f676c652e636c6f75642e" .
            "6461746170726f632e76312e436c75737465724d6574726963731a2d0a0b" .
            "4c6162656c73456e747279120b0a036b6579180120012809120d0a057661" .
            "6c75651802200128093a02380122a8040a0d436c7573746572436f6e6669" .
            "6712150a0d636f6e6669675f6275636b657418012001280912460a126763" .
            "655f636c75737465725f636f6e66696718082001280b322a2e676f6f676c" .
            "652e636c6f75642e6461746170726f632e76312e476365436c7573746572" .
            "436f6e66696712440a0d6d61737465725f636f6e66696718092001280b32" .
            "2d2e676f6f676c652e636c6f75642e6461746170726f632e76312e496e73" .
            "74616e636547726f7570436f6e66696712440a0d776f726b65725f636f6e" .
            "666967180a2001280b322d2e676f6f676c652e636c6f75642e6461746170" .
            "726f632e76312e496e7374616e636547726f7570436f6e666967124e0a17" .
            "7365636f6e646172795f776f726b65725f636f6e666967180c2001280b32" .
            "2d2e676f6f676c652e636c6f75642e6461746170726f632e76312e496e73" .
            "74616e636547726f7570436f6e66696712410a0f736f6674776172655f63" .
            "6f6e666967180d2001280b32282e676f6f676c652e636c6f75642e646174" .
            "6170726f632e76312e536f667477617265436f6e66696712520a16696e69" .
            "7469616c697a6174696f6e5f616374696f6e73180b2003280b32322e676f" .
            "6f676c652e636c6f75642e6461746170726f632e76312e4e6f6465496e69" .
            "7469616c697a6174696f6e416374696f6e12450a11656e6372797074696f" .
            "6e5f636f6e666967180f2001280b322a2e676f6f676c652e636c6f75642e" .
            "6461746170726f632e76312e456e6372797074696f6e436f6e666967222f" .
            "0a10456e6372797074696f6e436f6e666967121b0a136763655f70645f6b" .
            "6d735f6b65795f6e616d6518012001280922af020a10476365436c757374" .
            "6572436f6e66696712100a087a6f6e655f75726918012001280912130a0b" .
            "6e6574776f726b5f75726918022001280912160a0e7375626e6574776f72" .
            "6b5f75726918062001280912180a10696e7465726e616c5f69705f6f6e6c" .
            "7918072001280812170a0f736572766963655f6163636f756e7418082001" .
            "2809121e0a16736572766963655f6163636f756e745f73636f7065731803" .
            "20032809120c0a0474616773180420032809124a0a086d65746164617461" .
            "18052003280b32382e676f6f676c652e636c6f75642e6461746170726f63" .
            "2e76312e476365436c7573746572436f6e6669672e4d6574616461746145" .
            "6e7472791a2f0a0d4d65746164617461456e747279120b0a036b65791801" .
            "20012809120d0a0576616c75651802200128093a02380122d3020a13496e" .
            "7374616e636547726f7570436f6e66696712150a0d6e756d5f696e737461" .
            "6e63657318012001280512160a0e696e7374616e63655f6e616d65731802" .
            "2003280912110a09696d6167655f75726918032001280912180a106d6163" .
            "68696e655f747970655f75726918042001280912390a0b6469736b5f636f" .
            "6e66696718052001280b32242e676f6f676c652e636c6f75642e64617461" .
            "70726f632e76312e4469736b436f6e66696712160a0e69735f707265656d" .
            "707469626c65180620012808124a0a146d616e616765645f67726f75705f" .
            "636f6e66696718072001280b322c2e676f6f676c652e636c6f75642e6461" .
            "746170726f632e76312e4d616e6167656447726f7570436f6e6669671241" .
            "0a0c616363656c657261746f727318082003280b322b2e676f6f676c652e" .
            "636c6f75642e6461746170726f632e76312e416363656c657261746f7243" .
            "6f6e66696722590a124d616e6167656447726f7570436f6e666967121e0a" .
            "16696e7374616e63655f74656d706c6174655f6e616d6518012001280912" .
            "230a1b696e7374616e63655f67726f75705f6d616e616765725f6e616d65" .
            "180220012809224c0a11416363656c657261746f72436f6e666967121c0a" .
            "14616363656c657261746f725f747970655f75726918012001280912190a" .
            "11616363656c657261746f725f636f756e7418022001280522570a0a4469" .
            "736b436f6e66696712160a0e626f6f745f6469736b5f7479706518032001" .
            "280912190a11626f6f745f6469736b5f73697a655f676218012001280512" .
            "160a0e6e756d5f6c6f63616c5f7373647318022001280522690a184e6f64" .
            "65496e697469616c697a6174696f6e416374696f6e12170a0f6578656375" .
            "7461626c655f66696c6518012001280912340a11657865637574696f6e5f" .
            "74696d656f757418022001280b32192e676f6f676c652e70726f746f6275" .
            "662e4475726174696f6e22ed020a0d436c7573746572537461747573123c" .
            "0a05737461746518012001280e322d2e676f6f676c652e636c6f75642e64" .
            "61746170726f632e76312e436c75737465725374617475732e5374617465" .
            "120e0a0664657461696c18022001280912340a1073746174655f73746172" .
            "745f74696d6518032001280b321a2e676f6f676c652e70726f746f627566" .
            "2e54696d657374616d7012420a08737562737461746518042001280e3230" .
            "2e676f6f676c652e636c6f75642e6461746170726f632e76312e436c7573" .
            "7465725374617475732e537562737461746522560a055374617465120b0a" .
            "07554e4b4e4f574e1000120c0a084352454154494e471001120b0a075255" .
            "4e4e494e47100212090a054552524f521003120c0a0844454c4554494e47" .
            "1004120c0a085550444154494e471005223c0a085375627374617465120f" .
            "0a0b554e5350454349464945441000120d0a09554e4845414c5448591001" .
            "12100a0c5354414c455f535441545553100222a8010a0e536f6674776172" .
            "65436f6e66696712150a0d696d6167655f76657273696f6e180120012809" .
            "124c0a0a70726f7065727469657318022003280b32382e676f6f676c652e" .
            "636c6f75642e6461746170726f632e76312e536f667477617265436f6e66" .
            "69672e50726f70657274696573456e7472791a310a0f50726f7065727469" .
            "6573456e747279120b0a036b6579180120012809120d0a0576616c756518" .
            "02200128093a023801229a020a0e436c75737465724d657472696373124f" .
            "0a0c686466735f6d65747269637318012003280b32392e676f6f676c652e" .
            "636c6f75642e6461746170726f632e76312e436c75737465724d65747269" .
            "63732e486466734d657472696373456e747279124f0a0c7961726e5f6d65" .
            "747269637318022003280b32392e676f6f676c652e636c6f75642e646174" .
            "6170726f632e76312e436c75737465724d6574726963732e5961726e4d65" .
            "7472696373456e7472791a320a10486466734d657472696373456e747279" .
            "120b0a036b6579180120012809120d0a0576616c75651802200128033a02" .
            "38011a320a105961726e4d657472696373456e747279120b0a036b657918" .
            "0120012809120d0a0576616c75651802200128033a0238012282010a1443" .
            "7265617465436c75737465725265717565737412120a0a70726f6a656374" .
            "5f6964180120012809120e0a06726567696f6e18032001280912320a0763" .
            "6c757374657218022001280b32212e676f6f676c652e636c6f75642e6461" .
            "746170726f632e76312e436c757374657212120a0a726571756573745f69" .
            "64180420012809228b020a14557064617465436c75737465725265717565" .
            "737412120a0a70726f6a6563745f6964180120012809120e0a0672656769" .
            "6f6e18052001280912140a0c636c75737465725f6e616d65180220012809" .
            "12320a07636c757374657218032001280b32212e676f6f676c652e636c6f" .
            "75642e6461746170726f632e76312e436c757374657212400a1d67726163" .
            "6566756c5f6465636f6d6d697373696f6e5f74696d656f75741806200128" .
            "0b32192e676f6f676c652e70726f746f6275662e4475726174696f6e122f" .
            "0a0b7570646174655f6d61736b18042001280b321a2e676f6f676c652e70" .
            "726f746f6275662e4669656c644d61736b12120a0a726571756573745f69" .
            "64180720012809227a0a1444656c657465436c7573746572526571756573" .
            "7412120a0a70726f6a6563745f6964180120012809120e0a06726567696f" .
            "6e18032001280912140a0c636c75737465725f6e616d6518022001280912" .
            "140a0c636c75737465725f7575696418042001280912120a0a7265717565" .
            "73745f6964180520012809224d0a11476574436c75737465725265717565" .
            "737412120a0a70726f6a6563745f6964180120012809120e0a0672656769" .
            "6f6e18032001280912140a0c636c75737465725f6e616d65180220012809" .
            "22700a134c697374436c7573746572735265717565737412120a0a70726f" .
            "6a6563745f6964180120012809120e0a06726567696f6e18042001280912" .
            "0e0a0666696c74657218052001280912110a09706167655f73697a651802" .
            "2001280512120a0a706167655f746f6b656e18032001280922640a144c69" .
            "7374436c757374657273526573706f6e736512330a08636c757374657273" .
            "18012003280b32212e676f6f676c652e636c6f75642e6461746170726f63" .
            "2e76312e436c757374657212170a0f6e6578745f706167655f746f6b656e" .
            "18022001280922520a16446961676e6f7365436c75737465725265717565" .
            "737412120a0a70726f6a6563745f6964180120012809120e0a0672656769" .
            "6f6e18032001280912140a0c636c75737465725f6e616d65180220012809" .
            "222c0a16446961676e6f7365436c7573746572526573756c747312120a0a" .
            "6f75747075745f75726918012001280932b2080a11436c7573746572436f" .
            "6e74726f6c6c657212a4010a0d437265617465436c7573746572122e2e67" .
            "6f6f676c652e636c6f75642e6461746170726f632e76312e437265617465" .
            "436c7573746572526571756573741a1d2e676f6f676c652e6c6f6e677275" .
            "6e6e696e672e4f7065726174696f6e224482d3e493023e22332f76312f70" .
            "726f6a656374732f7b70726f6a6563745f69647d2f726567696f6e732f7b" .
            "726567696f6e7d2f636c7573746572733a07636c757374657212b3010a0d" .
            "557064617465436c7573746572122e2e676f6f676c652e636c6f75642e64" .
            "61746170726f632e76312e557064617465436c7573746572526571756573" .
            "741a1d2e676f6f676c652e6c6f6e6772756e6e696e672e4f706572617469" .
            "6f6e225382d3e493024d32422f76312f70726f6a656374732f7b70726f6a" .
            "6563745f69647d2f726567696f6e732f7b726567696f6e7d2f636c757374" .
            "6572732f7b636c75737465725f6e616d657d3a07636c757374657212aa01" .
            "0a0d44656c657465436c7573746572122e2e676f6f676c652e636c6f7564" .
            "2e6461746170726f632e76312e44656c657465436c757374657252657175" .
            "6573741a1d2e676f6f676c652e6c6f6e6772756e6e696e672e4f70657261" .
            "74696f6e224a82d3e49302442a422f76312f70726f6a656374732f7b7072" .
            "6f6a6563745f69647d2f726567696f6e732f7b726567696f6e7d2f636c75" .
            "73746572732f7b636c75737465725f6e616d657d12a8010a0a476574436c" .
            "7573746572122b2e676f6f676c652e636c6f75642e6461746170726f632e" .
            "76312e476574436c7573746572526571756573741a212e676f6f676c652e" .
            "636c6f75642e6461746170726f632e76312e436c7573746572224a82d3e4" .
            "93024412422f76312f70726f6a656374732f7b70726f6a6563745f69647d" .
            "2f726567696f6e732f7b726567696f6e7d2f636c7573746572732f7b636c" .
            "75737465725f6e616d657d12aa010a0c4c697374436c757374657273122d" .
            "2e676f6f676c652e636c6f75642e6461746170726f632e76312e4c697374" .
            "436c757374657273526571756573741a2e2e676f6f676c652e636c6f7564" .
            "2e6461746170726f632e76312e4c697374436c757374657273526573706f" .
            "6e7365223b82d3e493023512332f76312f70726f6a656374732f7b70726f" .
            "6a6563745f69647d2f726567696f6e732f7b726567696f6e7d2f636c7573" .
            "7465727312ba010a0f446961676e6f7365436c757374657212302e676f6f" .
            "676c652e636c6f75642e6461746170726f632e76312e446961676e6f7365" .
            "436c7573746572526571756573741a1d2e676f6f676c652e6c6f6e677275" .
            "6e6e696e672e4f7065726174696f6e225682d3e4930250224b2f76312f70" .
            "726f6a656374732f7b70726f6a6563745f69647d2f726567696f6e732f7b" .
            "726567696f6e7d2f636c7573746572732f7b636c75737465725f6e616d65" .
            "7d3a646961676e6f73653a012a42710a1c636f6d2e676f6f676c652e636c" .
            "6f75642e6461746170726f632e7631420d436c75737465727350726f746f" .
            "50015a40676f6f676c652e676f6c616e672e6f72672f67656e70726f746f" .
            "2f676f6f676c65617069732f636c6f75642f6461746170726f632f76313b" .
            "6461746170726f63620670726f746f33"
        ), true);

        static::$is_initialized = true;
    }
}
