const scaleNames={
    c: 'Celsius',
    f: 'Fahreneiht'
}

function toCelsius (fahreneiht) {
    return (fahreneiht - 32) * 5 / 9
}

function toFahreneiht (celsius) {
    return (celsius * 9 / 5) + 32
}

function BoilingVerdict({celsius}) {
    if (celsius >= 100) {
        return <div className="alert alert-success">L'eau bout</div>
    }
    return <div className="alert alert-info">L'eau ne bout pas</div>
}

function tryConvert(temperature, convert) {
    const value = parseFloat(temperature)
    if (Number.isNaN(value)) {
        return '';
    }
    return (Math.round(convert(value) * 100) / 100).toString()
}


class TemperatureInput extends React.Component {

    constructor(props){
        super(props)
        this.handleChange = this.handleChange.bind(this)
    }

    handleChange (e) {
        this.props.onTemperatureChange(e.target.value)
    }

    render() {
        const {temperature} = this.props
        const name = 'scale' + this.props.scale
        const scaleName = scaleNames[this.props.scale]
        return <div className="form-group">
            <label htmlFor={name}>Température (en {scaleName})</label>
            <input type="text" id={name} value={temperature} className="form-control" onChange={this.handleChange}/>
        </div>
    }

}


class Calculator extends React.Component {

    constructor(props) {
        super(props)
        this.state = {
            scale: 'c',
            temperature: 20
        }
        this.handleCelsiusChange = this.handleCelsiusChange.bind(this)
        this.handleFahreneihtChange = this.handleFahreneihtChange.bind(this)
    }

    handleCelsiusChange(temperature){
        this.setState({
            scale: 'c',
            temperature
        })
    }

    handleFahreneihtChange (temperature) {
        this.setState({
            scale: 'f',
            temperature
        })
    }


    handleChange (e) {
        this.setState({temperature: e.target.value})
    }


    render () {
        const {temperature, scale} = this.state
        const celsius = scale === 'c' ? temperature : tryConvert(temperature, toCelsius)
        const fahreneiht = scale === 'f' ? temperature : tryConvert(temperature, toFahreneiht)
        return <div>
            <TemperatureInput scale="c" temperature={celsius} onTemperatureChange={this.handleCelsiusChange}/>
            <TemperatureInput scale="f" temperature={fahreneiht} onTemperatureChange={this.handleFahreneihtChange}/>
            <BoilingVerdict celsius={celsius}/>
        </div>
    }
}


ReactDOM.render(<Calculator/>, document.getElementById('app'))