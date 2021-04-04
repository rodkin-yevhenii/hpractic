import { Component } from '@wordpress/element'
import { InspectorControls, RichText } from '@wordpress/editor'
import { __ } from '@wordpress/i18n'
import { PanelBody, PanelRow, SelectControl } from '@wordpress/components'

export default class LinkEdit extends Component {
  state = {
    selectedItem: null
  }

  addItem = () => {
    const {setAttributes, attributes} = this.props
    const {items} = attributes
    const newItems = [...items, {
      value: ''
    }]

    setAttributes({items: newItems})
    this.setState({
      selectedItem: newItems.length - 1
    })
  }

  removeItem = (i) => {
    const {setAttributes, attributes} = this.props
    const {items} = attributes
    const newItems = [...items]

    newItems.splice(i, 1)

    setAttributes({items: newItems})
    this.setState({
      selectedItem: null
    })
  }

  updateItem = (value, i) => {
    const {setAttributes, attributes} = this.props
    const {items} = attributes
    const newItems = [...items]

    newItems[i].value = value
    setAttributes({items: newItems})
  }

  render() {
    const {className, attributes, setAttributes, isSelected} = this.props
    const {items, type } = attributes

    return <>
      <div className={ isSelected ? className + ' active' : className }>
        <div className='block-title'>{__("Контейнер ссылок", "hpractice-gb")}</div>
        <InspectorControls>
          <PanelBody
            title={__('Настройки блока ссылок', 'v-catena-gutenberg')}
            initialOpen
          >
            <PanelRow>
              <SelectControl
                label='Тип ссылок (Телефон / Email)'
                value={type}
                options={[
                  {label: 'Телефон', value: 'phone'},
                  {label: 'Email', value: 'email'}
                ]}
                onChange={ (val) => setAttributes({ type: val })}
              />
            </PanelRow>
          </PanelBody>
        </InspectorControls>
        {items.length > 0 &&
          items.map((item, i) => {
            if ('' === item.phone) {
              return <>
                {0 < i &&
                  <br/>
                }
                <a
                  key={i}
                  onClick={() => this.setState({selectedItem: i})}
                  className={isSelected && i === this.state.selectedItem ? 'link link--secondary link--md active' : 'link link--secondary link--md'}
                >
                  <span className="link__inner">
                    <svg className="icon">
                      <use xlinkHref={'phone' === type ?
                        '/wp-content/themes/hpractic/frontend/src/img/icons-sprite.svg#icon-phone' :
                        '/wp-content/themes/hpractic/frontend/src/img/icons-sprite.svg#icon-mail'}
                      />
                    </svg>
                    <RichText
                      onChange={(value) => this.updateItem(value, i)}
                      value=''
                      tagName='span'
                      placeholder='+38 050 000-00-00'
                    />
                  </span>
                </a>
                {isSelected && i === this.state.selectedItem &&
                  <span
                    className='item__remove'
                    onClick={() => this.removeItem(i)}
                  >
                    <svg className="icon">
                      <use xlinkHref="/wp-content/themes/hpractic/frontend/src/img/icons-sprite.svg#icon-circle-x"/>
                    </svg>
                  </span>
                }
              </>
            } else {
              return <>
                {0 < i &&
                  <br/>
                }
                <a
                  key={i}
                  onClick={() => this.setState({selectedItem: i})}
                  className={isSelected && i === this.state.selectedItem ? 'link link--secondary link--md active' : 'link link--secondary link--md'}
                >
                  <span className="link__inner">
                    <svg className="icon">
                      <use xlinkHref={'phone' === type ?
                        '/wp-content/themes/hpractic/frontend/src/img/icons-sprite.svg#icon-phone' :
                        '/wp-content/themes/hpractic/frontend/src/img/icons-sprite.svg#icon-mail'}
                      />
                    </svg>
                    <RichText
                      onChange={(value) => this.updateItem(value, i)}
                      value={item.value}
                      tagName='span'
                      placeholder='+38 050 000-00-00'
                    />
                  </span>
                </a>
                {isSelected && i === this.state.selectedItem &&
                <span
                  className='item__remove'
                  onClick={() => this.removeItem(i)}
                >
                  <svg className="icon">
                    <use xlinkHref="/wp-content/themes/hpractic/frontend/src/img/icons-sprite.svg#icon-circle-x"/>
                  </svg>
                </span>
                }
              </>
            }
          })
        }
        {isSelected && items[items.length - 1].phone !== '' &&
          <>
            <div className='item__add'>
              <button onClick={ this.addItem }>Добавить новую ссылку</button>
            </div>
          </>
        }
      </div>
    </>
  }
}
