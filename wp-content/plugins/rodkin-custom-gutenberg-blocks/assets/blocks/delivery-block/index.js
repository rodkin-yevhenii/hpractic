import './styles.editor.scss'
import { registerBlockType } from "@wordpress/blocks"
import { InspectorControls, InnerBlocks, RichText } from "@wordpress/editor"
import { __ } from "@wordpress/i18n"
import { PanelBody, PanelRow, TextControl } from '@wordpress/components'
import { createElement } from '@wordpress/element'

registerBlockType("gutenberg-custom-block/delivery", {
  title: __("Блок для страницы доставка и оплата", "hpractice-gb"),
  description: __("Блок позволяет использовать секции с плавающим меню слева", "hpractice-gb"),
  category: "layout",
  icon:
    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M3 15h8v-2H3v2zm0 4h8v-2H3v2zm0-8h8V9H3v2zm0-6v2h8V5H3zm10 0h8v14h-8V5z"/></svg>,
  keywords: [
    __("Блок для страницы доставка и оплата", "hpractice-gb"),
  ],
  attributes: {
    title: {
      type: 'string',
    },
    anchor: {
      type: 'string',
    },
    iconTitle: {
      type: 'string',
    }
  },
  edit: function({ className, attributes, setAttributes }) {
    const { title, anchor, iconTitle } = attributes

    return (
      <div className={ className }>
        <InspectorControls>
          <PanelBody
            title={__('Настройки блока', 'v-catena-gutenberg')}
            initialOpen
          >
            <PanelRow>
              <TextControl
                label="Якорь блока (используйте только английский без пробелов)"
                value={anchor}
                onChange={ (value) => setAttributes({anchor: value}) }
              />
            </PanelRow>
              <TextControl
                label="ID иконки"
                value={iconTitle}
                onChange={ (value) => setAttributes({iconTitle: value}) }
              />
            <PanelRow>
            </PanelRow>
          </PanelBody>
        </InspectorControls>
        <div className="article__section" id={anchor}>
          <h3 className="heading heading--md heading--primary">
            <span className="heading__icon">
              <svg className="icon">
                <use xlinkHref={'/wp-content/themes/hpractic/frontend/src/img/icons-sprite.svg#' + iconTitle}></use>
              </svg>
            </span>
            <RichText
              onChange={ (value) => setAttributes({title: value}) }
              value={title}
              tagName={'span'}
              placeholder={__('Название секции', 'hpractice-gb')}
              className='heading__text'
            />
          </h3>
          <div className="article__section-content">
            <InnerBlocks />
          </div>
        </div>
      </div>
    )
  },
  save: function({ attributes }) {
    const { title, anchor, iconTitle } = attributes
    const xref = createElement('use', {
      'xlink:href': '/wp-content/themes/hpractic/frontend/src/img/icons-sprite.svg#' + iconTitle
    });

    return (
      <div className="article__section" data-anhor-item id={ anchor }>
        <h3 className="heading heading--md heading--primary">
          <span className="heading__icon">
              <svg className="icon">
                { xref }
              </svg>
          </span>
          <span className="heading__text">{ title }</span>
        </h3>
        <div className="article__section-content">
          <InnerBlocks.Content />
        </div>
      </div>
    )
  },
})
