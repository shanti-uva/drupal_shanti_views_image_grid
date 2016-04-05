<?php

/**
 * @file
 * Default simple view template to all the fields as a row.
 *
 * - $view: The view in use.
 * - $fields: an array of $field objects. Each one contains:
 *   - $field->content: The output of the field.
 *   - $field->raw: The raw data for the field, if it exists. This is NOT output safe.
 *   - $field->class: The safe class id to use.
 *   - $field->handler: The Views field handler object controlling this field. Do not use
 *     var_export to dump this object, as it can't handle the recursion.
 *   - $field->inline: Whether or not the field should be inline.
 *   - $field->inline_html: either div or span based on the above flag.
 *   - $field->wrapper_prefix: A complete wrapper containing the inline_html to use.
 *   - $field->wrapper_suffix: The closing tag for the wrapper.
 *   - $field->separator: an optional separator that may appear before a field.
 *   - $field->label: The wrap label text to use.
 *   - $field->label_html: The full HTML of the label to use including
 *     configured element type.
 * - $rows: The raw result object from the query, with all data it fetched.
 *
 * 
 * @ingroup views_templates
 */
?>

<a href="<?php print $row['href']; ?>" 
    data-fid="<?php print $row['fid']; ?>"
    data-largesrc="<?php print $row['large_url']; ?>" 
    data-hugesrc="<?php print $row['huge_url']; ?>" 
    data-title="<?php print $row['title']; ?>" 
    <?php 
        $field_order = array();
        foreach ($fields as $id => $field) {
            $attname = (empty($field->label)) ? $id : $field->label;
            $attval = (empty($field->content)) ? "" : $field->content;
            if (!empty($attval) > 0) { 
                print " data-{$attname}=\"{$attval}\"";
                $field_order[] = $attname;
            }
        } 
        if (!in_array('description', $field_order)) {
            print " data-description=\"" . t('Description not available.') . "\"";
        }
        print " data-field-order=\"". strtolower(implode(",", $field_order)) . '"';
    ?>
 > <img src="<?php print $row['img_url']; ?>" 
    alt="<?php print $row['title']; ?>" title="<?php print $row['title']; ?>"/></a>