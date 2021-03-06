<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/cloud/automl/v1beta1/annotation_payload.proto

namespace Google\Cloud\AutoMl\V1beta1;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Contains annotation information that is relevant to AutoML.
 *
 * Generated from protobuf message <code>google.cloud.automl.v1beta1.AnnotationPayload</code>
 */
class AnnotationPayload extends \Google\Protobuf\Internal\Message
{
    /**
     * Output only . The resource ID of the annotation spec that
     * this annotation pertains to. The annotation spec comes from either an
     * ancestor dataset, or the dataset that was used to train the model in use.
     *
     * Generated from protobuf field <code>string annotation_spec_id = 1;</code>
     */
    private $annotation_spec_id = '';
    /**
     * Output only. The value of [AnnotationSpec.display_name][google.cloud.automl.v1beta1.AnnotationSpec.display_name] when the model
     * was trained. Because this field returns a value at model training time,
     * for different models trained using the same dataset, the returned value
     * could be different as model owner could update the display_name between
     * any two model training.
     *
     * Generated from protobuf field <code>string display_name = 5;</code>
     */
    private $display_name = '';
    protected $detail;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type \Google\Cloud\AutoMl\V1beta1\TranslationAnnotation $translation
     *           Annotation details for translation.
     *     @type \Google\Cloud\AutoMl\V1beta1\ClassificationAnnotation $classification
     *           Annotation details for content or image classification.
     *     @type string $annotation_spec_id
     *           Output only . The resource ID of the annotation spec that
     *           this annotation pertains to. The annotation spec comes from either an
     *           ancestor dataset, or the dataset that was used to train the model in use.
     *     @type string $display_name
     *           Output only. The value of [AnnotationSpec.display_name][google.cloud.automl.v1beta1.AnnotationSpec.display_name] when the model
     *           was trained. Because this field returns a value at model training time,
     *           for different models trained using the same dataset, the returned value
     *           could be different as model owner could update the display_name between
     *           any two model training.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Cloud\Automl\V1Beta1\AnnotationPayload::initOnce();
        parent::__construct($data);
    }

    /**
     * Annotation details for translation.
     *
     * Generated from protobuf field <code>.google.cloud.automl.v1beta1.TranslationAnnotation translation = 2;</code>
     * @return \Google\Cloud\AutoMl\V1beta1\TranslationAnnotation
     */
    public function getTranslation()
    {
        return $this->readOneof(2);
    }

    /**
     * Annotation details for translation.
     *
     * Generated from protobuf field <code>.google.cloud.automl.v1beta1.TranslationAnnotation translation = 2;</code>
     * @param \Google\Cloud\AutoMl\V1beta1\TranslationAnnotation $var
     * @return $this
     */
    public function setTranslation($var)
    {
        GPBUtil::checkMessage($var, \Google\Cloud\AutoMl\V1beta1\TranslationAnnotation::class);
        $this->writeOneof(2, $var);

        return $this;
    }

    /**
     * Annotation details for content or image classification.
     *
     * Generated from protobuf field <code>.google.cloud.automl.v1beta1.ClassificationAnnotation classification = 3;</code>
     * @return \Google\Cloud\AutoMl\V1beta1\ClassificationAnnotation
     */
    public function getClassification()
    {
        return $this->readOneof(3);
    }

    /**
     * Annotation details for content or image classification.
     *
     * Generated from protobuf field <code>.google.cloud.automl.v1beta1.ClassificationAnnotation classification = 3;</code>
     * @param \Google\Cloud\AutoMl\V1beta1\ClassificationAnnotation $var
     * @return $this
     */
    public function setClassification($var)
    {
        GPBUtil::checkMessage($var, \Google\Cloud\AutoMl\V1beta1\ClassificationAnnotation::class);
        $this->writeOneof(3, $var);

        return $this;
    }

    /**
     * Output only . The resource ID of the annotation spec that
     * this annotation pertains to. The annotation spec comes from either an
     * ancestor dataset, or the dataset that was used to train the model in use.
     *
     * Generated from protobuf field <code>string annotation_spec_id = 1;</code>
     * @return string
     */
    public function getAnnotationSpecId()
    {
        return $this->annotation_spec_id;
    }

    /**
     * Output only . The resource ID of the annotation spec that
     * this annotation pertains to. The annotation spec comes from either an
     * ancestor dataset, or the dataset that was used to train the model in use.
     *
     * Generated from protobuf field <code>string annotation_spec_id = 1;</code>
     * @param string $var
     * @return $this
     */
    public function setAnnotationSpecId($var)
    {
        GPBUtil::checkString($var, True);
        $this->annotation_spec_id = $var;

        return $this;
    }

    /**
     * Output only. The value of [AnnotationSpec.display_name][google.cloud.automl.v1beta1.AnnotationSpec.display_name] when the model
     * was trained. Because this field returns a value at model training time,
     * for different models trained using the same dataset, the returned value
     * could be different as model owner could update the display_name between
     * any two model training.
     *
     * Generated from protobuf field <code>string display_name = 5;</code>
     * @return string
     */
    public function getDisplayName()
    {
        return $this->display_name;
    }

    /**
     * Output only. The value of [AnnotationSpec.display_name][google.cloud.automl.v1beta1.AnnotationSpec.display_name] when the model
     * was trained. Because this field returns a value at model training time,
     * for different models trained using the same dataset, the returned value
     * could be different as model owner could update the display_name between
     * any two model training.
     *
     * Generated from protobuf field <code>string display_name = 5;</code>
     * @param string $var
     * @return $this
     */
    public function setDisplayName($var)
    {
        GPBUtil::checkString($var, True);
        $this->display_name = $var;

        return $this;
    }

    /**
     * @return string
     */
    public function getDetail()
    {
        return $this->whichOneof("detail");
    }

}

