import { registerBlockType } from "@wordpress/blocks"
import { InnerBlocks, RichText } from "@wordpress/editor"
import { __ } from "@wordpress/i18n"

registerBlockType("gutenberg-custom-block/section", {
  title: __("Section", "v-catena-gutenberg"),
  description: __("Block allows you insert Author Widget into content", "v-catena-gutenberg"),
  category: "layout",
  icon: {
    background: '#7e70af',
    foreground: '#fff',
    src: 'book-alt'
  },
  keywords: [
    __("section", "v-catena-gutenberg"),
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
        <div className="block-title">Content Section</div>
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
