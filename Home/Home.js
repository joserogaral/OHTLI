import React from 'react';
import Foot from '../Footer/Foot';
import './Home.css';





class Home extends React.Component {
    constructor(props) {
        super(props);
        this.state = { 
            DResp: false,
            DDBD:[]
         };
    }
 
    UpDate(){

        fetch("http://localhost/OHTLI0624/WebService/Avis/")
        .then(Resp=>Resp.json())
        .then((DResp)=>{
            console.log(DResp)
            this.setState({DResp:true, DDBD:DResp})
        })
        .catch(console.log)

    }
    componentDidMount(){
        this.UpDate();
    }

    

    render() { 


        const{DDBD}=this.state;

    
        return (  
            <body>
            <section className="portada">
                <main>
                   <div className="csnt" >
                        <img src="../images/img/Teo.jpg" alt=""></img>
                        <h2 className="texres">Éveiller les conciences</h2>
                    </div>
                </main>
                <div className="capa12"></div>
            </section>
            
            <section>
                <main>
                    <div className="valores">
                        <div className="acomod">
                            <div className="imgvalores">
                                <img src="/images/111.jpg" alt=""></img>
                            </div>
                            <div className="imgvalores">
                                <img src="/images/2-3.jpg" alt=""></img>
                            </div>
                            <div className="imgvalores">
                                <img src="/images/4-3.jpg" alt=""></img>
                            </div>
                        </div>
                    </div>  
                </main>
            </section>
        
            <section>
                <main className="eleccion"> 
                    <div className="zapatosw">
                        <a href="/Wave">
                            <span className="hdpm">
                                <img src="../images/img/wave.jpg" alt="" id="izq"></img>
                            </span>
                            <div className="capa11"></div>        
                        </a>
                        
                        <a href="/Wave" className="enci">
                            <h1>WAVE</h1>
                            <h3>plastique récupéré des óceans</h3>
                        </a>
                    </div>
                    
                    <div className="zapatosc">
                        <a href="/Cactus">
                            <span>
                                <img src="../images/img/Cactus.jpg" alt="" id="izq"></img>
                            </span>  
                            <div className="capa11"></div>
                        </a>
                        <a href="/Cactus" className="enci">
                            <h1>CACTUS</h1>
                            <h3>cuir du cactus</h3>
                        </a>
                    </div>
                    
                </main>
            </section>
        
            <section>
                <main className="valor1">
                    <div className="ttv">
                       <p>Il faut projecter l'etape suivante: <br></br>
                    un monde dans lequel consommer des produits responsables <br></br>
                    est normal et possible pour tous</p> 
                    </div>
                    <div className="blok">
                        <div className="imgvalores">
                            <img src="../images/33.jpg" alt=""></img>
                        </div>
                        <div className="imgvalores">
                            <img src="../images/5-1.jpg" alt=""></img>
                        </div> 
                    </div>
                </main>
            </section>
        
            <section>
                <main className='acomoddd'>
                    <div className="carru">   
                        <div className="sect">
                            <a href="/Carrousel">
                                <img src="../images/img/cami.jpg" alt=""></img>
                            </a>
                            <a className="nomtext">
                                <h3>LookBook</h3>
                            </a>
                        </div>
                        <div className="sect">
                            <a href="/Apropos"> 
                                <img src="../images/img/zapzap.jpg" alt=""></img>
                            </a>
                            <a className="nomtext">
                                <h3>About Us</h3>
                            </a>
                        </div>
                        <div className="sect">
                            <a href="/Transparence">
                                <img src="../images/img/fab1.jpg" alt=""></img>
                            </a>
                            <a className="nomtext">
                                <h3>Transparence</h3>
                            </a>
                        </div>
                        <div className="sect">
                            <a href="/Partenaires">
                                <img src="../images/img/Cactus1.jpg" alt=""></img>
                            </a>
                            <a className="nomtext">
                                <h3>Partenaires</h3>
                            </a>
                        </div>    
                   </div>
                </main>
            </section>
        
            <section>
                <div className="tittt">
                        <h1>Nous aimons partager votre satisfaction</h1> <br></br>
                        <h2>Aidez-nous avec vos commentaires</h2>
                    </div>
                <main className="avis" > 
                {  
                    DDBD.map(   
                        (DDBDD)=>(
                                <div className="commes" key={DDBD.ID}>
                                    <div className="msgenvi" >
                                        <h1>{DDBDD.NomAvis}</h1>
                                        <h2>{DDBDD.Avis}</h2>
                                    </div>
                                </div>
                        )
                    )}
                    </main>
            </section>
        
            <section>
                <main>
                    <div className="tendence">
                        <div className="contrls">
                            <div className="icontend">
                                <h2>Tendence</h2>
                                <span className="material-symbols-outlined">whatshot</span>
                            </div>
                        </div>
                        <div className="mosttend">
                            <div className="artic">
                                <img src="../images/img/IMG_0539 copia.jpg" alt=""></img>
                                <h3>Nombre prod</h3>
                            </div>
                            <div className="artic">
                                <img src="../images/img/IMG_0539 copia.jpg" alt=""></img>
                                <h3>Nombre prod</h3>
                            </div>
                            <div className="artic">
                                <img src="../images/img/IMG_0539 copia.jpg" alt=""></img>
                                <h3>Nombre prod</h3>
                            </div>
                            <div className="artic">
                                <img src="../images/img/IMG_0539 copia.jpg" alt=""></img>
                                <h3>Nombre prod</h3>
                            </div>
                        </div>
                    </div>
                </main>
            </section>
            
            <Foot></Foot>
        </body>
        
         ); 
    }
}
 
export default Home;