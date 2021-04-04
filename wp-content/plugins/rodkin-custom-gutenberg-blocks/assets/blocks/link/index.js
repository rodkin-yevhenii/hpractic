import './styles.editor.scss'
import { registerBlockType } from "@wordpress/blocks"
import { __ } from "@wordpress/i18n"
import edit from './edit'
import { createElement } from '@wordpress/element'

registerBlockType("gutenberg-custom-block/link", {
  title: __("Ссылка на Телефоны / Email", "hpractice-gb"),
  description: __("Вставка номера телефона со ссылкой и иконкой", "hpractice-gb"),
  category: "text",
  icon:
    <svg xmlns="http://www.w3.org/2000/svg" enableBackground="new 0 0 24 24" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><g><rect fill="none" height="24" width="24"/><path d="M17,15l1.55,1.55c-0.96,1.69-3.33,3.04-5.55,3.37V11h3V9h-3V7.82C14.16,7.4,15,6.3,15,5c0-1.65-1.35-3-3-3S9,3.35,9,5 c0,1.3,0.84,2.4,2,2.82V9H8v2h3v8.92c-2.22-0.33-4.59-1.68-5.55-3.37L7,15l-4-3v3c0,3.88,4.92,7,9,7s9-3.12,9-7v-3L17,15z M12,4 c0.55,0,1,0.45,1,1s-0.45,1-1,1s-1-0.45-1-1S11.45,4,12,4z"/></g></svg>,
  keywords: [
    __("Ссылка", "hpractice-gb"),
    __("Ссылка на телефон", "hpractice-gb"),
    __("Ссылка на email", "hpractice-gb"),
  ],
  attributes: {
    items: {
      type: 'array',
      default: [{
        value: ''
      }],
      query: [{
        value: {
          type: 'string'
        }
      }]
    },
    type: {
      type: 'string',
      default: 'phone'
    }
  },
  edit,
  save: function({ attributes }) {
    const { items, type } = attributes
    const isPhone = 'phone' === type
    const icon = createElement('use', {
      'xlink:href': isPhone ?
        '/wp-content/themes/hpractic/frontend/src/img/icons-sprite.svg#icon-phone' :
        '/wp-content/themes/hpractic/frontend/src/img/icons-sprite.svg#icon-mail'
    });

    return <>
      {items.length > 0 &&
        items.map((item, i) => {
          return <>
            {i > 0 &&
              <br/>
            }
            <a
              key={i}
              href={isPhone ? 'tel:' + item.value.replace(/(\s|\(|\)|-)/g, '') : 'mailto:' + item.value}
              className="link link--secondary link--md"
            >
              <span className="link__inner">
                  <svg className="icon">
                    {icon}
                  </svg>
                  <span>{item.value}</span>
              </span>
            </a>
          </>
        })
      }
    </>
  },
})
