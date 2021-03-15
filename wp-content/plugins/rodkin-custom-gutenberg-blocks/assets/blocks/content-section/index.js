import { registerBlockType } from "@wordpress/blocks"
import { InnerBlocks, RichText } from "@wordpress/editor"
import { __ } from "@wordpress/i18n"

registerBlockType("gutenberg-custom-block/section", {
  title: __("Секция контента", "hpractice-gb"),
  description: __("Блок позволяет использовать секции с заголовком слева и контентом справа", "hpractice-gb"),
  category: "layout",
  icon: <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="black" width="24px" height="24px"><path d="M0 0h24v24H0z" fill="none"/><path d="M3 19h6v-7H3v7zm7 0h12v-7H10v7zM3 5v6h19V5H3z"/></svg>,
  keywords: [
    __("section", "hpractice-gb"),
  ],
  attributes: {
    sectionTitle: {
      type: 'string',
    }
  },
  edit: function({ className, attributes, setAttributes }) {
    const { sectionTitle } = attributes

    return (
      <article className={ className + ' article' }>
        <div className="block-title">{__("Секция контента", "hpractice-gb")}</div>
        <div className="article__inner section__inner" style={{display: 'flex'}}>
          <div className="article__aside section__main" style={{width: '300px', flexShrink: 0}}>
            <RichText
              onChange={ (value) => setAttributes({sectionTitle: value}) }
              value={sectionTitle}
              tagName={'h3'}
              placeholder={__('Section header', 'hpractice-gb')}
              className={'heading heading--md heading--primary'}
            />
          </div>
          <div className="article__content section__content" style={{width: '100%'}}>
            <InnerBlocks />
          </div>
        </div>
      </article>
    )
  },
  save: function({ attributes }) {
    const { sectionTitle } = attributes

    return (
      <article className='article'>
        <div className="article__inner section__inner">
          <div className="article__aside section__main">
            <h3 className="heading heading--md heading--primary">
              { sectionTitle }
            </h3>
          </div>
          <div className="article__content section__content">
            <InnerBlocks.Content />
          </div>
        </div>
      </article>
    )
  },
})
