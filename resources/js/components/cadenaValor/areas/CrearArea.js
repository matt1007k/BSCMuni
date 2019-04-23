import React, { Component } from "react";
import { render } from "react-dom";
import { TextInput, Button } from "react-materialize";

class CrearArea extends Component {
    render() {
        return (
            <form>
                <div className="row">
                    <div class="input-field col s12">
                        <TextInput
                            label="First Name"
                            validate
                            error="Wrong Email sir"
                            success="Great"
                        />
                    </div>
                </div>

                <div class="input-field">
                    <Button waves="light" style={{ marginRight: "5px" }}>
                        Guardar
                    </Button>
                </div>
            </form>
        );
    }
}

export default CrearArea;
const crear = document.querySelector(".crearArea");
if (crear) {
    render(<CrearArea />, crear);
}
