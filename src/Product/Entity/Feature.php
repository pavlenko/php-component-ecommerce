<?php
/**
 * SunNY Creative Technologies
 *
 *   #####                                ##     ##    ##      ##
 * ##     ##                              ###    ##    ##      ##
 * ##                                     ####   ##     ##    ##
 * ##           ##     ##    ## #####     ## ##  ##      ##  ##
 *   #####      ##     ##    ###    ##    ##  ## ##       ####
 *        ##    ##     ##    ##     ##    ##   ####        ##
 *        ##    ##     ##    ##     ##    ##    ###        ##
 * ##     ##    ##     ##    ##     ##    ##     ##        ##
 *   #####        #######    ##     ##    ##     ##        ##
 *
 * C  R  E  A  T  I  V  E     T  E  C  H  N  O  L  O  G  I  E  S
 */

namespace PE\Component\ECommerce\Product\Entity;

/**
 * Feature group
 */
class Feature
{
    /**
     * @var string
     */
    private $id;

    /**
     * Group type
     *
     * Text types:
     *   text
     *   text area
     *   rich text
     * Select types:
     *   Check box
     *   Combo box (suggest)
     *   Color (same as check box, but displayed differently)
     *
     * @var string
     */
    private $type;

    /**
     * Title
     *
     * @var string
     */
    private $title;

    /**
     * References to features of this group
     *
     * @var FeatureOption[]
     */
    private $options = [];

    /**
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param string $id
     *
     * @return $this
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param string $type
     *
     * @return $this
     */
    public function setType($type)
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param string $title
     *
     * @return $this
     */
    public function setTitle($title)
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @return FeatureOption[]
     */
    public function getOptions()
    {
        return $this->options;
    }

    /**
     * @param FeatureOption[] $options
     *
     * @return $this
     */
    public function setOptions($options)
    {
        $this->options = [];

        foreach ($options as $option) {
            $this->addOption($option);
        }

        return $this;
    }

    /**
     * @param FeatureOption $option
     *
     * @return $this
     */
    public function addOption(FeatureOption $option)
    {
        $this->options[] = $option->setFeature($this);
        return $this;
    }

    /**
     * @param FeatureOption $option
     *
     * @return $this
     */
    public function removeOption(FeatureOption $option)
    {
        if (false !== ($key = array_search($option, $this->options, true))) {
            $option->setFeature(null);
            unset($this->options[$key]);
        }

        return $this;
    }
}