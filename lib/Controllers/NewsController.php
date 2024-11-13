<?php

namespace Celine\Theme\Controllers;

/**
 * Undocumented class
 */
class NewsController
{
    public static function getNews()
    {
        if (self::_isCategory()) {
            $args = array(
                "numberposts" => 3,
                "orderby" => "date",
                "order" => "DESC",
                "category" => self::_getCategory(),
            );

            return get_posts($args);
        } else {
            $args = array(
                "numberposts" => 3,
                "orderby" => "date",
                "order" => "DESC"
            );

            if (have_rows("news_selection")) {
                $newsIds = get_field("news_selection");
                $args["post__in"] = $newsIds;
            }
            return get_posts($args);
        }
    }

    public static function getNewsCategory()
    {
        $term_id = self::_getCategory();
        $term = get_term($term_id);
        return $term->slug;
    }

    private static function _isCategory()
    {
        return get_field("news_is_category");
    }

    private static function _getCategory()
    {
        return get_field("news_category");
    }
}
