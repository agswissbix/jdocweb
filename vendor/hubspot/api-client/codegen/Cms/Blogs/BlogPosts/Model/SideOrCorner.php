<?php
/**
 * SideOrCorner
 *
 * PHP version 7.3
 *
 * @category Class
 * @package  HubSpot\Client\Cms\Blogs\BlogPosts
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 */

/**
 * Blog Post endpoints
 *
 * Use these endpoints for interacting with Blog Posts, Blog Authors, and Blog Tags
 *
 * The version of the OpenAPI document: v3
 * Generated by: https://openapi-generator.tech
 * OpenAPI Generator version: 6.0.0-SNAPSHOT
 */

/**
 * NOTE: This class is auto generated by OpenAPI Generator (https://openapi-generator.tech).
 * https://openapi-generator.tech
 * Do not edit the class manually.
 */

namespace HubSpot\Client\Cms\Blogs\BlogPosts\Model;

use \ArrayAccess;
use \HubSpot\Client\Cms\Blogs\BlogPosts\ObjectSerializer;

/**
 * SideOrCorner Class Doc Comment
 *
 * @category Class
 * @package  HubSpot\Client\Cms\Blogs\BlogPosts
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 * @implements \ArrayAccess<TKey, TValue>
 * @template TKey int|null
 * @template TValue mixed|null
 */
class SideOrCorner implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'SideOrCorner';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'vertical_side' => 'string',
        'horizontal_side' => 'string'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      * @phpstan-var array<string, string|null>
      * @psalm-var array<string, string|null>
      */
    protected static $openAPIFormats = [
        'vertical_side' => null,
        'horizontal_side' => null
    ];

    /**
     * Array of property to type mappings. Used for (de)serialization
     *
     * @return array
     */
    public static function openAPITypes()
    {
        return self::$openAPITypes;
    }

    /**
     * Array of property to format mappings. Used for (de)serialization
     *
     * @return array
     */
    public static function openAPIFormats()
    {
        return self::$openAPIFormats;
    }

    /**
     * Array of attributes where the key is the local name,
     * and the value is the original name
     *
     * @var string[]
     */
    protected static $attributeMap = [
        'vertical_side' => 'verticalSide',
        'horizontal_side' => 'horizontalSide'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'vertical_side' => 'setVerticalSide',
        'horizontal_side' => 'setHorizontalSide'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'vertical_side' => 'getVerticalSide',
        'horizontal_side' => 'getHorizontalSide'
    ];

    /**
     * Array of attributes where the key is the local name,
     * and the value is the original name
     *
     * @return array
     */
    public static function attributeMap()
    {
        return self::$attributeMap;
    }

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @return array
     */
    public static function setters()
    {
        return self::$setters;
    }

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @return array
     */
    public static function getters()
    {
        return self::$getters;
    }

    /**
     * The original name of the model.
     *
     * @return string
     */
    public function getModelName()
    {
        return self::$openAPIModelName;
    }

    const VERTICAL_SIDE_TOP = 'TOP';
    const VERTICAL_SIDE_MIDDLE = 'MIDDLE';
    const VERTICAL_SIDE_BOTTOM = 'BOTTOM';
    const HORIZONTAL_SIDE_LEFT = 'LEFT';
    const HORIZONTAL_SIDE_CENTER = 'CENTER';
    const HORIZONTAL_SIDE_RIGHT = 'RIGHT';

    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getVerticalSideAllowableValues()
    {
        return [
            self::VERTICAL_SIDE_TOP,
            self::VERTICAL_SIDE_MIDDLE,
            self::VERTICAL_SIDE_BOTTOM,
        ];
    }

    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getHorizontalSideAllowableValues()
    {
        return [
            self::HORIZONTAL_SIDE_LEFT,
            self::HORIZONTAL_SIDE_CENTER,
            self::HORIZONTAL_SIDE_RIGHT,
        ];
    }

    /**
     * Associative array for storing property values
     *
     * @var mixed[]
     */
    protected $container = [];

    /**
     * Constructor
     *
     * @param mixed[] $data Associated array of property values
     *                      initializing the model
     */
    public function __construct(array $data = null)
    {
        $this->container['vertical_side'] = $data['vertical_side'] ?? null;
        $this->container['horizontal_side'] = $data['horizontal_side'] ?? null;
    }

    /**
     * Show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalidProperties = [];

        if ($this->container['vertical_side'] === null) {
            $invalidProperties[] = "'vertical_side' can't be null";
        }
        $allowedValues = $this->getVerticalSideAllowableValues();
        if (!is_null($this->container['vertical_side']) && !in_array($this->container['vertical_side'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value '%s' for 'vertical_side', must be one of '%s'",
                $this->container['vertical_side'],
                implode("', '", $allowedValues)
            );
        }

        if ($this->container['horizontal_side'] === null) {
            $invalidProperties[] = "'horizontal_side' can't be null";
        }
        $allowedValues = $this->getHorizontalSideAllowableValues();
        if (!is_null($this->container['horizontal_side']) && !in_array($this->container['horizontal_side'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value '%s' for 'horizontal_side', must be one of '%s'",
                $this->container['horizontal_side'],
                implode("', '", $allowedValues)
            );
        }

        return $invalidProperties;
    }

    /**
     * Validate all the properties in the model
     * return true if all passed
     *
     * @return bool True if all properties are valid
     */
    public function valid()
    {
        return count($this->listInvalidProperties()) === 0;
    }


    /**
     * Gets vertical_side
     *
     * @return string
     */
    public function getVerticalSide()
    {
        return $this->container['vertical_side'];
    }

    /**
     * Sets vertical_side
     *
     * @param string $vertical_side vertical_side
     *
     * @return self
     */
    public function setVerticalSide($vertical_side)
    {
        $allowedValues = $this->getVerticalSideAllowableValues();
        if (!in_array($vertical_side, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value '%s' for 'vertical_side', must be one of '%s'",
                    $vertical_side,
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['vertical_side'] = $vertical_side;

        return $this;
    }

    /**
     * Gets horizontal_side
     *
     * @return string
     */
    public function getHorizontalSide()
    {
        return $this->container['horizontal_side'];
    }

    /**
     * Sets horizontal_side
     *
     * @param string $horizontal_side horizontal_side
     *
     * @return self
     */
    public function setHorizontalSide($horizontal_side)
    {
        $allowedValues = $this->getHorizontalSideAllowableValues();
        if (!in_array($horizontal_side, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value '%s' for 'horizontal_side', must be one of '%s'",
                    $horizontal_side,
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['horizontal_side'] = $horizontal_side;

        return $this;
    }
    /**
     * Returns true if offset exists. False otherwise.
     *
     * @param integer $offset Offset
     *
     * @return boolean
     */
    public function offsetExists($offset): bool
    {
        return isset($this->container[$offset]);
    }

    /**
     * Gets offset.
     *
     * @param integer $offset Offset
     *
     * @return mixed|null
     */
    #[\ReturnTypeWillChange]
    public function offsetGet($offset)
    {
        return $this->container[$offset] ?? null;
    }

    /**
     * Sets value based on offset.
     *
     * @param int|null $offset Offset
     * @param mixed    $value  Value to be set
     *
     * @return void
     */
    public function offsetSet($offset, $value): void
    {
        if (is_null($offset)) {
            $this->container[] = $value;
        } else {
            $this->container[$offset] = $value;
        }
    }

    /**
     * Unsets offset.
     *
     * @param integer $offset Offset
     *
     * @return void
     */
    public function offsetUnset($offset): void
    {
        unset($this->container[$offset]);
    }

    /**
     * Serializes the object to a value that can be serialized natively by json_encode().
     * @link https://www.php.net/manual/en/jsonserializable.jsonserialize.php
     *
     * @return mixed Returns data which can be serialized by json_encode(), which is a value
     * of any type other than a resource.
     */
    #[\ReturnTypeWillChange]
    public function jsonSerialize()
    {
       return ObjectSerializer::sanitizeForSerialization($this);
    }

    /**
     * Gets the string presentation of the object
     *
     * @return string
     */
    public function __toString()
    {
        return json_encode(
            ObjectSerializer::sanitizeForSerialization($this),
            JSON_PRETTY_PRINT
        );
    }

    /**
     * Gets a header-safe presentation of the object
     *
     * @return string
     */
    public function toHeaderValue()
    {
        return json_encode(ObjectSerializer::sanitizeForSerialization($this));
    }
}


