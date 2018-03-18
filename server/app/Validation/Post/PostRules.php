<?php namespace App\Validation\Post;

use App\Data\Models\Post as Model;
use App\Json\Schemes\PostSchema as Schema;
use App\Validation\BaseRules;
use Limoncello\Validation\Contracts\Rules\RuleInterface;

/**
 * @package App
 *
 * @SuppressWarnings(PHPMD.StaticAccess)
 */
final class PostRules extends BaseRules
{
    /**
     * @return RuleInterface
     */
    public static function postType(): RuleInterface
    {
        return self::equals(Schema::TYPE);
    }

    /**
     * @return RuleInterface
     */
    public static function title(): RuleInterface
    {
        $maxLength = Model::getAttributeLengths()[Model::FIELD_TITLE];

        return self::asSanitizedString(self::stringLengthMax($maxLength));
    }

    /**
     * @return RuleInterface
     */
    public static function text(): RuleInterface
    {
        return self::asSanitizedString();
    }
}