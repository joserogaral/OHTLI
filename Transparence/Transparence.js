import React from 'react';
import Foot from '../Footer/Foot';
import './Transparence.css';

class Transparence extends React.Component {
    constructor(props) {
        super(props);
        this.state = { 
            DRespy: false,
            DDBDy:[]
            };
    }

    UpDate(){

        fetch("http://localhost/OHTLI0624/WebService/Transs/Transs.php")
        .then(Respy=>Respy.json())
        .then((DRespy)=>{
            console.log(DRespy)
            this.setState({DRespy:true, DDBDy:DRespy})
        })
        .catch(console.log)

    }
    componentDidMount(){
        this.UpDate();
    }


    render() { 

        const{DDBDy}=this.state;

        function ComboAno(){
            var n = (new Date()).getFullYear()
            var select = document.getElementById("ano");
            for(var i = n; i>=2019; i--)select.options.add(new Option(i,i)); 
         };
         window.onload = ComboAno;         
        return ( 
<body>
    <div className="container">
        <div className="expli">
            <h1>Transparence</h1>
            <p>OHTLI a pour objectif d’apporter son grain de sable à la construction d’un modèle socialement et écologiquement responsable. <br></br><br></br>
                C'est pourquoi, grâce à des méthodes de transparence, nous rendons public notre empreinte carbone et les projets à impact environnemental 
                ou le nombre d'arbres plantés pour atteindre notre bilan carbone.</p>  
        </div>
             
        <div className="mes">
            <div className="selecte">
                <h2>Année</h2>
                <select name="" id="ano" className="anno"></select>
            </div>
            {  
                    DDBDy.map(   
                        (DDBDDy)=>(
            <div className="cen6" key={DDBDy.ID}>
                <div className="mes1">
                    <button target="_blank"> 
                        <img src="../images/img/derecha.png" alt=""></img> 
                        <h2>{DDBDDy.Month}</h2> 
                        <img src="../images/img/izquierda.png" alt=""></img>
                    </button> 
                </div>
            </div>
  )
  )}
        </div>
    </div>
    <Foot></Foot>
</body>
         );
    }
}
 
export default Transparence;