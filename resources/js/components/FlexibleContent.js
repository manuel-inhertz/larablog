import React from 'react';
import ReactDOM from 'react-dom';
import { Editor } from '@tinymce/tinymce-react';
import ImageUpload from './blocks/ImageUpload';
import Repeater from './Repeater';
import Code from './blocks/Code';

class FlexibleContent extends React.Component {
    
    constructor(props) {
        super(props);
        this.state = {
            elements: {},
            content: '',
            addBlocksDropdown: {
                'codeBlock' : 'Code',
                'richTextBlock' : 'RichText Editor',
                'imageBlock' : 'Image',
                'twoColumnsBlock' : 'Two Columns',
            }
        };
    }
    
    generateKey = (pre) => {
        return _.uniqueId(`${pre}_`);
    }

    handleAddBlocks = (block) => {
        this.setState((prevState, props) => ({
            elements: {
                ...prevState.elements,
                [block]: {
                   ...prevState.elements[block],
                   num: (prevState.elements[block]) ? prevState.elements[block].num + 1 : 1
                }
            }
        }));
    }

    handleEditorChange = (e) => {
        this.setState((prevState, props) => ({
            elements: {
                'richTextBlock': {
                    ...prevState.elements['richTextBlock'],
                    [`content-${e.target.id}`] : e.target.getContent()
                }
            }
        }));
    }

    handleCodeChange = (e) => {
        console.log(e.target.value);
    }

    render() {
        return (
            <div id="FlexibleContentBlocks">
                <input type="hidden" name="content" value="" />
                <div className="blocks">
                    {
                        Object.keys(this.state.elements).map((element, idx) => {
                            if(this.state.elements[element].num !== 0) {
                                switch(element) {
                                    case 'richTextBlock':
                                        return (
                                            <Repeater key={this.generateKey(`repeater`)} repeat={this.state.elements[element].num}> 
                                                <Editor 
                                                    onBlur={this.handleEditorChange} 
                                                    init={{height: "300"}} 
                                                    value={this.state.elements[element][`content-${tinymce.get('ID')}`]}
                                                />
                                                {console.log(tinymce.get('ID'))}
                                            </Repeater>
                                        )
                                    case 'imageBlock':
                                        return (
                                            <Repeater key={this.generateKey(`repeater`)} repeat={this.state.elements[element].num}> 
                                                <ImageUpload onChange={this.handleContentChange} action="/api/" />
                                            </Repeater>
                                        )
                                    case 'codeBlock':
                                        return (
                                            <Repeater key={this.generateKey(`repeater`)} repeat={this.state.elements[element].num}>
                                                <Code onBlur={this.handleCodeChange} />
                                            </Repeater>
                                        )
                                }
                            }
                        })
                    }
                </div>
                <div className="add-blocks dropdown mt-4">
                    <button className="btn btn-secondary dropdown-toggle" type="button" id="addBlocksDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Add Blocks
                    </button>
                    <div className="dropdown-menu" aria-labelledby="addBlocksDropdown">
                        {
                            Object.keys(this.state.addBlocksDropdown).map((block, i) => {
                                return <a className="dropdown-item" href="#" key={i} onClick={() => this.handleAddBlocks(block)}>{ this.state.addBlocksDropdown[block] }</a>
                            })
                        }
                    </div>
                </div>
            </div>
        );
    }
}

export default FlexibleContent;

if (document.getElementById('flexible-content')) {
    ReactDOM.render(<FlexibleContent />, document.getElementById('flexible-content'));
}
