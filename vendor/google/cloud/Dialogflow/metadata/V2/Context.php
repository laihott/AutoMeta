<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/cloud/dialogflow/v2/context.proto

namespace GPBMetadata\Google\Cloud\Dialogflow\V2;

class Context
{
    public static $is_initialized = false;

    public static function initOnce() {
        $pool = \Google\Protobuf\Internal\DescriptorPool::getGeneratedPool();

        if (static::$is_initialized == true) {
          return;
        }
        \GPBMetadata\Google\Api\Annotations::initOnce();
        \GPBMetadata\Google\Api\Resource::initOnce();
        \GPBMetadata\Google\Protobuf\GPBEmpty::initOnce();
        \GPBMetadata\Google\Protobuf\FieldMask::initOnce();
        \GPBMetadata\Google\Protobuf\Struct::initOnce();
        $pool->internalAddGeneratedFile(hex2bin(
            "0abc0f0a28676f6f676c652f636c6f75642f6469616c6f67666c6f772f76" .
            "322f636f6e746578742e70726f746f121a676f6f676c652e636c6f75642e" .
            "6469616c6f67666c6f772e76321a19676f6f676c652f6170692f7265736f" .
            "757263652e70726f746f1a1b676f6f676c652f70726f746f6275662f656d" .
            "7074792e70726f746f1a20676f6f676c652f70726f746f6275662f666965" .
            "6c645f6d61736b2e70726f746f1a1c676f6f676c652f70726f746f627566" .
            "2f7374727563742e70726f746f225c0a07436f6e74657874120c0a046e61" .
            "6d6518012001280912160a0e6c6966657370616e5f636f756e7418022001" .
            "2805122b0a0a706172616d657465727318032001280b32172e676f6f676c" .
            "652e70726f746f6275662e537472756374224c0a134c697374436f6e7465" .
            "78747352657175657374120e0a06706172656e7418012001280912110a09" .
            "706167655f73697a6518022001280512120a0a706167655f746f6b656e18" .
            "032001280922660a144c697374436f6e7465787473526573706f6e736512" .
            "350a08636f6e746578747318012003280b32232e676f6f676c652e636c6f" .
            "75642e6469616c6f67666c6f772e76322e436f6e7465787412170a0f6e65" .
            "78745f706167655f746f6b656e18022001280922210a11476574436f6e74" .
            "65787452657175657374120c0a046e616d65180120012809225c0a144372" .
            "65617465436f6e7465787452657175657374120e0a06706172656e741801" .
            "2001280912340a07636f6e7465787418022001280b32232e676f6f676c65" .
            "2e636c6f75642e6469616c6f67666c6f772e76322e436f6e74657874227d" .
            "0a14557064617465436f6e746578745265717565737412340a07636f6e74" .
            "65787418012001280b32232e676f6f676c652e636c6f75642e6469616c6f" .
            "67666c6f772e76322e436f6e74657874122f0a0b7570646174655f6d6173" .
            "6b18022001280b321a2e676f6f676c652e70726f746f6275662e4669656c" .
            "644d61736b22240a1444656c657465436f6e746578745265717565737412" .
            "0c0a046e616d65180120012809222a0a1844656c657465416c6c436f6e74" .
            "6578747352657175657374120e0a06706172656e7418012001280932ef07" .
            "0a08436f6e746578747312ac010a0c4c697374436f6e7465787473122f2e" .
            "676f6f676c652e636c6f75642e6469616c6f67666c6f772e76322e4c6973" .
            "74436f6e7465787473526571756573741a302e676f6f676c652e636c6f75" .
            "642e6469616c6f67666c6f772e76322e4c697374436f6e74657874735265" .
            "73706f6e7365223982d3e493023312312f76322f7b706172656e743d7072" .
            "6f6a656374732f2a2f6167656e742f73657373696f6e732f2a7d2f636f6e" .
            "7465787473129b010a0a476574436f6e74657874122d2e676f6f676c652e" .
            "636c6f75642e6469616c6f67666c6f772e76322e476574436f6e74657874" .
            "526571756573741a232e676f6f676c652e636c6f75642e6469616c6f6766" .
            "6c6f772e76322e436f6e74657874223982d3e493023312312f76322f7b6e" .
            "616d653d70726f6a656374732f2a2f6167656e742f73657373696f6e732f" .
            "2a2f636f6e74657874732f2a7d12aa010a0d437265617465436f6e746578" .
            "7412302e676f6f676c652e636c6f75642e6469616c6f67666c6f772e7632" .
            "2e437265617465436f6e74657874526571756573741a232e676f6f676c65" .
            "2e636c6f75642e6469616c6f67666c6f772e76322e436f6e746578742242" .
            "82d3e493023c22312f76322f7b706172656e743d70726f6a656374732f2a" .
            "2f6167656e742f73657373696f6e732f2a7d2f636f6e74657874733a0763" .
            "6f6e7465787412b2010a0d557064617465436f6e7465787412302e676f6f" .
            "676c652e636c6f75642e6469616c6f67666c6f772e76322e557064617465" .
            "436f6e74657874526571756573741a232e676f6f676c652e636c6f75642e" .
            "6469616c6f67666c6f772e76322e436f6e74657874224a82d3e493024432" .
            "392f76322f7b636f6e746578742e6e616d653d70726f6a656374732f2a2f" .
            "6167656e742f73657373696f6e732f2a2f636f6e74657874732f2a7d3a07" .
            "636f6e746578741294010a0d44656c657465436f6e7465787412302e676f" .
            "6f676c652e636c6f75642e6469616c6f67666c6f772e76322e44656c6574" .
            "65436f6e74657874526571756573741a162e676f6f676c652e70726f746f" .
            "6275662e456d707479223982d3e49302332a312f76322f7b6e616d653d70" .
            "726f6a656374732f2a2f6167656e742f73657373696f6e732f2a2f636f6e" .
            "74657874732f2a7d129c010a1144656c657465416c6c436f6e7465787473" .
            "12342e676f6f676c652e636c6f75642e6469616c6f67666c6f772e76322e" .
            "44656c657465416c6c436f6e7465787473526571756573741a162e676f6f" .
            "676c652e70726f746f6275662e456d707479223982d3e49302332a312f76" .
            "322f7b706172656e743d70726f6a656374732f2a2f6167656e742f736573" .
            "73696f6e732f2a7d2f636f6e7465787473429b010a1e636f6d2e676f6f67" .
            "6c652e636c6f75642e6469616c6f67666c6f772e7632420c436f6e746578" .
            "7450726f746f50015a44676f6f676c652e676f6c616e672e6f72672f6765" .
            "6e70726f746f2f676f6f676c65617069732f636c6f75642f6469616c6f67" .
            "666c6f772f76323b6469616c6f67666c6f77f80101a202024446aa021a47" .
            "6f6f676c652e436c6f75642e4469616c6f67666c6f772e5632620670726f" .
            "746f33"
        ), true);

        static::$is_initialized = true;
    }
}
