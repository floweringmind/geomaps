<?php

namespace Magentowizard\Geomaps\Block\Adminhtml\Grid\Edit;

/**
 * Adminhtml Add New Row Form.
 */
class Form extends \Magento\Backend\Block\Widget\Form\Generic
{
    /**
     * @var \Magento\Store\Model\System\Store
     */
    protected $_systemStore;

    /**
     * @param \Magento\Backend\Block\Template\Context $context,
     * @param \Magento\Framework\Registry $registry,
     * @param \Magento\Framework\Data\FormFactory $formFactory,
     * @param \Magento\Cms\Model\Wysiwyg\Config $wysiwygConfig,
     * @param \Magentowizard\Geomaps\Model\Status $options,
     */
    public function __construct(
        \Magento\Store\Model\System\Store $systemStore,
        \Magentowizard\Geomaps\Block\Adminhtml\Grid\AddRow $addRows,
        \Magento\Backend\Block\Template\Context $context,
        \Magento\Framework\Registry $registry,
        \Magento\Framework\Data\FormFactory $formFactory,
        \Magento\Cms\Model\Wysiwyg\Config $wysiwygConfig,
        \Magentowizard\Geomaps\Model\Status $options,
        array $data = []
    ) {
        $this->_systemStore = $systemStore;
        $this->_addrows = $addRows;
        $this->_options = $options;
        $this->_wysiwygConfig = $wysiwygConfig;
        parent::__construct($context, $registry, $formFactory, $data);
    }

    /**
     * Prepare form.
     *
     * @return $this
     */
    protected function _prepareForm()
    {
        $dateFormat = $this->_localeDate->getDateFormat(\IntlDateFormatter::SHORT);
        $model = $this->_coreRegistry->registry('row_data');
        $form = $this->_formFactory->create(
            ['data' => [
                            'id' => 'edit_form',
                            'enctype' => 'multipart/form-data',
                            'action' => $this->getData('action'),
                            'method' => 'post'
                        ]
            ]
        );

        $form->setHtmlIdPrefix('geomaps_');
        if ($model->getEntityId()) {
            $fieldset = $form->addFieldset(
                'base_fieldset',
                ['legend' => __('Edit Page'), 'class' => 'fieldset-wide']
            );
            $fieldset->addField('entity_id', 'hidden', ['name' => 'entity_id']);
        } else {
            $fieldset = $form->addFieldset(
                'base_fieldset',
                ['legend' => __('Add Page'), 'class' => 'fieldset-wide']
            );
        }

// replace with our store code below when we figure it out
// how to save https://magento.stackexchange.com/questions/139000/magento-2-add-multiselect-store-views-in-admin-form
// and how to have it select the field saved.

//    $fieldset->addField(
//       'store_ids',
//       'multiselect',
//       [
//         'name'     => 'store_ids[]',
//         'label'    => __('Store Views'),
//         'title'    => __('Store Views'),
//         'required' => true,
//         'values'   => $this->_systemStore->getStoreValuesForForm(false, true),
//       ]
//    );

        $fieldset->addField(
            'store_ids',
            'hidden',
            [
                'name' => 'store_ids',
                'id' => 'store_ids',
            ]
        );

        $fieldset->addField(
            'store_select',
            'multiselect',
            [
                'label' => __('Store Chooser'),
                'title' => __('Store Chooser'),
                'name' => 'store_select',
                'values' => $this->_addrows->getStoreValues(),

            ]
        );

        $fieldset->addField(
            'stores',
            'text',
            [
                'name' => 'stores',
                'label' => __('Current Stores'),
                'id' => 'stores',
                'title' => __('Current Stores'),
            ]
        );

        $fieldset->addField(
            'url_key',
            'text',
            [
                'name' => 'url_key',
                'label' => __('Url Key'),
                'id' => 'url_key',
                'title' => __('Url Key'),
                'class' => 'required-entry',
                'required' => true,
            ]
        );

        $fieldset->addField(
            'region_code',
            'text',
            [
                'name' => 'region_code',
                'label' => __('Region Code'),
                'id' => 'region_code',
                'title' => __('Region Code'),
                'class' => 'required-entry',
                'required' => true,
            ]
        );

        $fieldset->addField(
            'region_name',
            'text',
            [
                'name' => 'region_name',
                'label' => __('Region Name'),
                'id' => 'region_name',
                'title' => __('Region Name'),
                'class' => 'required-entry',
                'required' => true,
            ]
        );

        $fieldset->addField(
            'page_heading',
            'editor',
            [
                'name' => 'page_heading',
                'label' => __('Page Heading Text Content'),
                'style' => 'height:36em;',
                'required' => true
            ]
        );

        $fieldset->addField(
            'middle_block_code',
            'text',
            [
                'name' => 'middle_block_code',
                'label' => __('Middle Content - Static Block Code'),
                'id' => 'middle_block_code',
                'title' => __('Middle Content - Static Block Code'),
                'class' => 'required-entry',
                'required' => true,
            ]
        );

        $fieldset->addField(
            'city_content',
            'editor',
            [
                'name' => 'city_content',
                'label' => __('Cities Text Content'),
                'style' => 'height:36em;',
                'required' => true
            ]
        );

        $fieldset->addField(
            'bottom_block_code',
            'text',
            [
                'name' => 'bottom_block_code',
                'label' => __('Bottom Content - Static Block Code'),
                'id' => 'bottom_block_code',
                'title' => __('Bottom Content - Static Block Code'),
                'class' => 'required-entry',
                'required' => true,
            ]
        );

        $fieldset->addField(
            'page_title',
            'text',
            [
                'name' => 'page_title',
                'label' => __('Page Meta Title'),
                'id' => 'page_title',
                'title' => __('Page Meta Title'),
                'class' => 'required-entry',
                'required' => true,
            ]
        );

        $fieldset->addField(
            'meta_keywords',
            'text',
            [
                'name' => 'meta_keywords',
                'label' => __('Meta Keywords'),
                'id' => 'meta_keywords',
                'title' => __('Meta Keywords'),
                'class' => 'required-entry',
                'required' => true,
            ]
        );

        $fieldset->addField(
            'meta_description',
            'text',
            [
                'name' => 'meta_description',
                'label' => __('Meta Description'),
                'id' => 'meta_description',
                'title' => __('Meta Description'),
                'class' => 'required-entry',
                'required' => true,
            ]
        );

        $fieldset->addField(
            'is_active',
            'select',
            [
                'name' => 'is_active',
                'label' => __('Status'),
                'id' => 'is_active',
                'title' => __('Status'),
                'values' => $this->_options->getOptionArray(),
                'class' => 'status',
                'required' => true,
            ]
        );
        $form->setValues($model->getData());
        $form->setUseContainer(true);
        $this->setForm($form);

        return parent::_prepareForm();
    }
}
