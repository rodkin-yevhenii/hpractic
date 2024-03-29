import './styles.editor.scss'
import { registerBlockType } from "@wordpress/blocks"
import { InnerBlocks } from "@wordpress/editor"
import { __ } from "@wordpress/i18n"

registerBlockType("gutenberg-custom-block/container", {
  title: __("Контейнер изображений", "hpractice-gb"),
  description: __("Контейнер для изображений", "hpractice-gb"),
  category: "layout",
  icon: <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><path d="M0 0h24v24H0z" fill="none"/><path d="M4 4h7V2H4c-1.1 0-2 .9-2 2v7h2V4zm6 9l-4 5h12l-3-4-2.03 2.71L10 13zm7-4.5c0-.83-.67-1.5-1.5-1.5S14 7.67 14 8.5s.67 1.5 1.5 1.5S17 9.33 17 8.5zM20 2h-7v2h7v7h2V4c0-1.1-.9-2-2-2zm0 18h-7v2h7c1.1 0 2-.9 2-2v-7h-2v7zM4 13H2v7c0 1.1.9 2 2 2h7v-2H4v-7z"/></svg>,
  keywords: [
    __("Контейнер изображений", "hpractice-gb"),
    __("Блок изображений", "hpractice-gb"),
  ],
  edit: function({ className }) {
    return (
      <div className={ className }>
        <div className='block-title'>{__("Контейнер изображений", "hpractice-gb")}</div>
        <InnerBlocks allowedBlocks={['core/image']}/>
      </div>
    )
  },
  save: function() {
    return (
      <div>
          <InnerBlocks.Content />
      </div>
    )
  },
})
