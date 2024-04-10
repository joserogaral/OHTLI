import React from 'react';
import Foot from '../Footer/Foot';
import './Contact.css';



class Contact extends React.Component {
    constructor(props) {
        super(props);
        this.state = { 
            Msg:"",
            NetP:"",
            Email:"",
            Phone:""
         }
    }
    

    CVs = (e) =>{
        const state=this.state;
        state[e.target.name]=e.target.value;
        this.setState({ state});
    }
    
    enda = (e) =>{
        e.preventDefault();
        console.log("Formulario enviado.....");

        const {Msg,NetP,Email,Phone}=this.state;

        console.log(Msg);
        console.log(NetP);
        console.log(Email);
        console.log(Phone);

        console.log(`Enviando mensaje......`);

    }


    render() { 

        const {Msg,NetP,Email,Phone}=this.state;

        return ( 
<div>         
    <div className="form">
        <div className="formtxt">
            <h1>OHTLI - Toulouse : contact</h1>
            <h3>Vous avez des questions ou avez eu un problème ? <br></br><br></br> Écrivez-nous, nous sommes là pour vous aider.</h3>
        </div> 
        <div className="form1">
                <form onSubmit={this.enda}>
                    <div className="ttt">
                        <div className="lttl">
                            <strong><h2>Formulaire de contact</h2></strong>
                            <div>
                                <label htmlFor="">Nom</label><br></br><br></br>
                                <input type="text" required className="lbl" value={NetP} onChange={this.CVs} name="nompre" id="nompre" placeholder="Nom"/>
                            </div>
                            <div>
                                <label htmlFor="">Téléphone</label><br></br><br></br>
                                <input type="text" required className="lbl" value={Phone} onChange={this.CVs} name="telephone" id="telephone" placeholder="Telephone"/>
                            </div>
                            <div>
                                <label htmlFor="">Email</label><br></br><br></br>
                                <input type="text" required className="lbl" value={Email} onChange={this.CVs} name="email" id="email" placeholder="Email"/>
                            </div>
                        </div>
                        <div className="elo">
                            <div>
                                <label htmlFor="">Messagge</label> <br></br><br></br>
                                <input type="text" required className="lbl" value={Msg} onChange={this.CVs} name="msg" id="msg" placeholder="Message"/>
                            </div>
                        </div>
                    </div>
                    <div className="bbb">
                        <div  role="group" aria-label="">
                            <button type="submit">Envoyer</button>
                        </div>
                    </div>
                </form>
        </div>
        <div className="map">
            <div className="mapa">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d5901.170608114208!2d1.4419262350960527!3d43.599954164415294!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x12aebbb2f4bd4dd7%3A0x8648c41bbf5d98da!2sCafe%20Bong!5e0!3m2!1ses!2sfr!4v1701254077501!5m2!1ses!2sfr" width="650" height="700" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </div>
    <Foot></Foot>
</div>


         );
    }
}
 
export default Contact;