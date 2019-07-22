var app = new Vue({
	el: '#app',

	data: {
        bg:"#6ccad0",
        text:"#dd0955",
		option: '',
		searchUser: '',
		open: false,
		show: 't1',
		showAllComments: false,
		//-------------------------------

		//-------------------------------------------
		bgColor: '',
		bgColorText: '',
		//-------------------------------------------
		button: true,
		theme: false,

		niveau: '',

		//---------------------------profile---------------------

		profile: {
			id: '',
			civilite: '',
			nom: '',
			prenom: '',
			photo: '',
			telephonne: '',
			adresse: '',
			paye: '',
			ville: '',
			dateNaissance: '',
			email: '',
			password: ''
		},
		//---------------comment-------------------
		idcmt: '',
		addCmt: true,
		Comments: [],
		coments: {
			commentaire: ''
		},
		//--------------------
		//---------------------
		img: '/public/img/photo.jpg',
		//------------------------
		search: '',

		data: [],

		cvs: [],
		//-------------------------------------
		errorsLien: [],
		errorsCv: [],
		errorsCv1: [],
		errorsInfo: [],
		errorsComp: [],
		errorsForm: [],
		errorsExp: [],
		errorsLang: [],
		errorsLois: [],
		errorsCv: [],
		errorsComment: [],
		//--------------register user-----------
		user: {
			civilite: '',
			nom: '',
			prenom: '',
			dateNaissance: '',
			image: '',
			paye: '',
			ville: '',
			telephonne: '',

			email: '',
			password: '',
			password_confirmation: ''
		},

		//------------------villes----------------
		villes: [],
		//---------------payes-----------------
		payes: [],
		paye: '',

		//-----------------------infos--------------

		openInfo: false,
		//-----------------------Competence--------------
		idComp: '',
		openCompetence: false,

		//-----------------------Formation--------------
		idForm: '',
		openFormation: false,

		//-----------------------Experience--------------
		idExp: '',
		openExperience: false,

		//-----------------------Loisire--------------
		idLoisire: '',
		openLoisire: false,

		//-----------------------Langue--------------
		idLang: '',
		openLangue: false,

		Experiences: [],
		Exps: {
			titre: '',
			description: '',
			entreprise: '',
			logo: '',
			dateDebut: '',
			dateFin: ''
		},
		Formations: [],
		Forms: {
			titre: '',
			description: '',
			etablissement: '',
			dateDebut: '',
			dateFin: ''
		},
		Competences: [],
		Comps: {
			competence: '',
			pourcentage: ''
		},
		Loisires: [],
		Lois: {
			loisire: ''
		},

		Langues: [],
		Langs: {
			langue: '',
			pourcentage: ''
		},
		idLien: '',
		Liens: [],
		Lien: {
			service: '',
			url: ''
		},
		Infos: {
			civilite: '',
			nom: '',
			prenom: '',
			email: '',
			telephonne: '',
			adresse: '',
			dateNaissance: '',
			ville: '',
			paye: ''
		},
		Cv: {
			titre: '',
			presentation: '',
			niveau: '',
			photo: '',
			image: ''
		},
		check: [],
		dash: true,
		Notif: '',
        NotifList: [],
      
	},

	//----------------------------------methodes-------------------------
	methods: {
        //----------------color-------------------------
        backColor:function(){

            this.bgColor = 'background-color:' + this.bg;
            console.log('okkkkk')
        },
        textColor:function(){

            this.bgColorText = 'color:' + this.text;
        },
    
        //------------------------------------
		isAdmin: function(id) {
			Swal.fire({
				title: 'Vous ete sur?',
				text: '',
				type: 'warning',
				showCancelButton: true,
				confirmButtonColor: '#3085d6',
				cancelButtonColor: '#d33',
				confirmButtonText: 'yes'
			}).then((result) => {
				if (result.value) {
					axios
						.put('/admin/' + id)
						.then((respense) => {
							if (respense.data.etat) {
                                window.location.href = '';
							}
							console.log('**********-----************** ok', respense.data.etat);
						})
						.catch((error) => {
							console.log('error edit state', error.response);
						});
				}
			});
		},
		//--------------------------------------
		Notifications: function() {
			axios
				.get('/Notifications')
				.then((respense) => {
					this.Notif = respense.data.Notif.length;
					this.NotifList = respense.data.Notif;

					console.log('success get notifications', respense.data.Notif.length);
				})
				.catch((error) => {
					console.log('error get notifications', error.response);
				});
		},
		EditState: function(id) {
			
			axios
				.put('/EditState/' + id)
				.then((respense) => {
                    console.log('success edit notifications', respense.data.etat);
                    window.location.href = '/showCv/' + id
				})
				.catch((error) => {
					console.log('error edit notifications', error.response);
				});
		},

		//----------------------------------------------
		Villes: function() {
			axios
				.get('/getVilles/' + this.paye)
				.then((respense) => {
					this.villes = '';
					this.villes = respense.data.villes;
					console.log('success get villes', this.villes);
				})
				.catch((error) => {
					console.log('error get villes');
				});
		},

		//--------------------------------------------------
		dateExp: function() {
			var MindateF = this.Exps.dateDebut;
			console.log('=========min' + MindateF);
			return MindateF;
		},

		//---------------------------------------------------

		dateForm: function(dateD) {
			var MindateF = this.Forms.dateDebut;
			return MindateF;
		},
		//-----------------------------------------------------

		printDiv: function(div) {
			var printContents = document.getElementById(div).innerHTML;
			var originalContents = document.body.innerHTML;
			document.body.innerHTML = printContents;
			window.print();
            document.body.innerHTML = originalContents;
            window.location.href='';
		},
		//-------------------------------------------------
		//------------------------------
		searching: function() {
			axios
				.get('/search/' + this.search)
				.then((success) => {
					this.data = success.data.cvs;
					this.allTitre();
					console.log('success search data ==>', this.data);
				})
				.catch((error) => {
					console.log('error result serching', error);
				});
		},
		//------------------------------

		//-----------------------------------------------
		allTitre: function() {
			axios
				.get('/allTitre')
				.then((success) => {
					this.data = success.data.results;
					console.log('alltitre search ==>', this.data);
				})
				.catch((error) => {
					console.log('error result serching', error);
				});
		},

		//-----------------------------------------
		previewFilesExp(event) {
			let file = event.target.files[0];

			let reader = new FileReader();
			console.log('ok');
			reader.onloadend = () => {
				console.log('resulte ===> ', reader.result);
				this.Exps.logo = reader.result;
			};
			reader.readAsDataURL(file);
		},
		previewFiles(event) {
			let file = event.target.files[0];

			let reader = new FileReader();
			console.log('ok');
			reader.onloadend = () => {
				console.log('resulte ===> ', reader.result);
				this.Cv.image = reader.result;
				this.Cv.photo = reader.result;
			};
			reader.readAsDataURL(file);
		},
		previewFiles1(event) {
			let file = event.target.files[0];

			let reader = new FileReader();
			console.log('ok');
			reader.onloadend = () => {
				console.log('resulte ===> ', reader.result);
				this.Cv1.photo1 = reader.result;
			};
			reader.readAsDataURL(file);
		},
		photoProfile(event) {
			let file = event.target.files[0];

			let reader = new FileReader();
			console.log('ok');
			reader.onloadend = () => {
				console.log('resulte ===> ', reader.result);

				this.profile.photo = reader.result;
			};
			reader.readAsDataURL(file);
		},

		//-----------------------get villes -----------------------
		getVilles: function() {
			axios
				.get('/getVilles/' + this.Infos.paye)
				.then((respense) => {
					this.villes = '';
					this.villes = respense.data.villes;
					console.log('success get villes', this.villes);
				})
				.catch((error) => {
					console.log('error get villes');
				});
		},
		//-----------------------get payes---------------
		getPayes: function() {
			axios
				.get('/getPayes')
				.then((respense) => {
					this.payes = respense.data.payes;
				})
				.catch((error) => {
					console.log('error get payes');
				});
		},
		//--------------------------------------------------------------------------------

		CommentOpen: function(id, comment) {
			this.idcmt = id;
			this.open = true;
			this.addCmt = false;
			this.coments = comment;
		},

		showComments: function() {
			this.open = false;
			this.showAllComments = !this.showAllComments;
		},
		openForm: function() {
			this.open = !this.open;
			this.dash = false;
			this.addCmt = true;
		},

		formation: function() {
			this.button = true;
			this.Forms = {
				titre: '',
				description: '',
				etablissement: '',
				dateDebut: '',
				dateFin: ''
			};
		},
		experience: function() {
			this.button = true;
		},
		competence: function() {
			this.button = true;
			this.Comps = {
				competence: '',
				pourcentage: ''
			};
		},
		langue: function() {
			this.button = true;
			this.Langs = {
				langue: '',
				pourcentage: ''
			};
		},
		link: function() {
			this.button = true;
			this.Lien = {
				service: '',
				url: ''
			};
		},
		loisire: function() {
			this.button = true;
			this.Lois = {
				loisire: ''
			};
		},
		//-------------------------------Comments----------------------
		addComment: function() {
			axios
				.post('/addComment/' + idcv, this.coments)
				.then((respense) => {
					Swal.fire('Successfly', 'Votre comentaire a été ajouter avec succée', 'success');
					console.log('success add comment', respense.data.comment);
					this.coments = {
						commentaire: ''
					};
					this.getComments();
					this.errorsComment = '';
					this.open = false;
				})
				.catch((error) => {
					if (error.response.status == 422) this.errorsComment = error.response.data.errors;
				});
		},
		//-----------------------getComment-----------------
		getComments: function() {
			axios
				.get('/getComments/' + idcv)
				.then((respense) => {
					this.Comments = respense.data.comments;

					console.log('succes get comment', this.Comments);
				})
				.catch((error) => {
					console.log('error get comments');
				});
		},
		deleteComment: function(id) {
			Swal.fire({
				title: 'Vous ete sur?',
				text: 'de supprimer ce commentaire!',
				type: 'warning',
				showCancelButton: true,
				confirmButtonColor: '#3085d6',
				cancelButtonColor: '#d33',
				confirmButtonText: 'Oui, Supprimer!!!'
			}).then((result) => {
				if (result.value) {
					console.log('succes delete comment', id);
					axios
						.delete('/deleteComment/' + id)
						.then((respense) => {
							console.log('succes delete comment', respense.data.etat);
							if (respense.data.etat) {
								var index = this.Comments.indexOf(id);
								this.Comments.splice(index, 1);
								this.getComments();
							}
						})
						.catch((error) => {
							console.log('error delete comment', error.response);
						});
				}
			});
		},
		editComment: function() {
			axios
				.put('/editComment/' + this.idcmt, this.coments)
				.then((respense) => {
					Swal.fire('Successfly', 'Votre competence a été modifier avec succée', 'success');

					console.log('succes edit comment', respense.data.etat);
					this.coments = {
						coment: ''
					};
					this.getComments();
				})
				.catch((error) => {
					console.log('error edit comment', error);
					if (error.response.status == 422) this.errorsComment = error.response.data.errors;
				});
		},

		//--------------------------------Competences-------------------------------------
		addCompetence: function() {
			axios
				.post('/addCompetence/' + idcv, this.Comps)
				.then((respense) => {
					console.log('success add competences');
					Swal.fire('Successfly', 'Votre competence a été ajouter avec succée', 'success');
					this.Comps = {
						competence: '',
						pourcentage: ''
					};
					this.getCompetences();
					this.errorsComp = '';
				})
				.catch((error) => {
					if (error.response.status == 422) this.errorsComp = error.response.data.errors;
				});
		},
		getCompetences: function() {
			axios
				.get('/getCompetences/' + idcv)
				.then((respense) => {
					console.log('succes get competences');
					this.Competences = respense.data.competences;
				})
				.catch((error) => {
					console.log('error get competences');
				});
		},
		deleteCompetence: function(competence) {
			Swal.fire({
				title: 'Vous ete sur?',
				text: 'de supprimer cette competence!',
				type: 'warning',
				showCancelButton: true,
				confirmButtonColor: '#3085d6',
				cancelButtonColor: '#d33',
				confirmButtonText: 'Oui, Supprimer!!!'
			}).then((result) => {
				if (result.value) {
					axios
						.delete('/deleteCompetence/' + this.idComp)
						.then((respense) => {
							console.log('succes delete competence');
							if (respense.data.etat) {
								var index = this.Competences.indexOf(competence);
								this.Competences.splice(index, 1);
							}
						})
						.catch((error) => {
							console.log('error delete competences');
						});
				}
			});
		},
		editCompetence: function(competence) {
			this.Comps = competence;
		},
		updateCompetence: function(competence) {
			axios
				.put('/updateCompetence/' + competence.idComp, competence)
				.then((respense) => {
					console.log('succes updtate competences', respense.data.etat);
					this.openCompetence = false;
					Swal.fire('Successfly', 'Votre competence a été modifier avec succée', 'success');
					this.Comps = {
						competence: '',
						pourcentage: ''
					};
					this.errorsComp = '';
				})
				.catch((error) => {
					if (error.response.status == 422) this.errorsComp = error.response.data.errors;
					console.log('error updtate competences', error.response);
				});
		},
		//--------------------------------Formations-------------------------------------
		addFormation: function() {
			axios
				.post('/addFormation/' + idcv, this.Forms)
				.then((respense) => {
					console.log('success add Formations');
					Swal.fire('Successfly', 'Votre formation a été ajouter avec succée', 'success');
					this.Forms = {
						titre: '',
						description: '',
						etablissement: '',
						dateDebut: '',
						dateFin: ''
					};
					this.getFormations();
					this.errorsForm = '';
				})
				.catch((error) => {
					if (error.response.status == 422) this.errorsForm = error.response.data.errors;
				});
		},
		getFormations: function() {
			axios
				.get('/getFormations/' + idcv)
				.then((respense) => {
					console.log('succes get Formations');
					this.Formations = respense.data.formations;
				})
				.catch((error) => {
					console.log('error get Formations');
				});
		},
		deleteFormation: function(formation) {
			Swal.fire({
				title: 'Vous ete sur?',
				text: 'de supprimer cette formation!',
				type: 'warning',
				showCancelButton: true,
				confirmButtonColor: '#3085d6',
				cancelButtonColor: '#d33',
				confirmButtonText: 'Oui, Supprimer!!!'
			}).then((result) => {
				if (result.value) {
					axios
						.delete('/deleteFormation/' + this.idForm)
						.then((respense) => {
							console.log('succes delete Formation');
							if (respense.data.etat) {
								var index = this.Formations.indexOf(formation);
								this.Formations.splice(index, 1);
							}
						})
						.catch((error) => {
							console.log('error delete Formations');
						});
				}
			});
		},
		editFormation: function(Formation) {
			this.Forms = Formation;
		},
		updateFormation: function() {
			axios
				.put('/updateFormation/' + this.idForm, this.Forms)
				.then((respense) => {
					console.log('succes updtate Formations');
					this.openFormation = false;
					Swal.fire('Successfly', 'Votre formation a été modifier avec succée', 'success');
					this.Forms = {
						titre: '',
						description: '',
						etablissement: '',
						dateDebut: '',
						dateFin: ''
					};
					this.errorsForm = '';
				})
				.catch((error) => {
					if (error.response.status == 422) this.errorsForm = error.response.data.errors;
				});
		},
		//--------------------------------Experiences-------------------------------------
		addExperience: function() {
			axios
				.post('/addExperience/' + idcv, this.Exps)
				.then((respense) => {
					Swal.fire('Successfly', 'Votre experience a été ajouter avec succée', 'success');

					this.Exps = {
						titre: '',
						description: '',
						entreprise: '',
						logo: '',
						dateDebut: '',
						dateFin: ''
					};
					console.log(this.Exps.dateFin - this.Exps.dateDebut);
					this.getExperiences();
					this.errorsExp = '';
				})
				.catch((error) => {
					if (error.response.status == 422) this.errorsExp = error.response.data.errors;
				});
		},
		getExperiences: function() {
			axios
				.get('/getExperiences/' + idcv)
				.then((respense) => {
					console.log('succes get Experiences');
					this.Experiences = respense.data.Experiences;
					console.log(this.Experiences);
				})
				.catch((error) => {
					console.log('error get Experiences');
				});
		},
		deleteExperience: function(experience) {
			Swal.fire({
				title: 'Vous ete sur?',
				text: 'de supprimer cette experience!',
				type: 'warning',
				showCancelButton: true,
				confirmButtonColor: '#3085d6',
				cancelButtonColor: '#d33',
				confirmButtonText: 'Oui, Supprimer!!!'
			}).then((result) => {
				if (result.value) {
					axios
						.delete('/deleteExperience/' + this.idExp)
						.then((respense) => {
							console.log('succes delete Experience');
							if (respense.data.etat) {
								var index = this.Experiences.indexOf(experience);
								this.Experiences.splice(index, 1);
							}
						})
						.catch((error) => {
							console.log('error delete Experiences');
						});
				}
			});
		},
		editExperience: function(Experience) {
			this.Exps = Experience;
		},
		updateExperience: function(experience) {
			axios
				.put('/updateExperience/' + experience.id, experience)
				.then((respense) => {
					Swal.fire('Successfly', 'Votre experience a été modifier avec succée', 'success');
					console.log('succes updtate Experiences');
					this.openExperience = false;
					this.Exps = {
						titre: '',
						description: '',
						entreprise: '',
						logo: '',
						dateDebut: '',
						dateFin: ''
					};
					this.errorsExp = '';
				})
				.catch((error) => {
					if (error.response.status == 422) this.errorsExp = error.response.data.errors;
					console.log('exp error ===', this.errorsExp);
				});
		},
		//--------------------------------Loisires-------------------------------------
		addLoisire: function() {
			axios
				.post('/addLoisire/' + idcv, this.Lois)
				.then((respense) => {
					console.log('success add Loisires');
					Swal.fire('Successfly', 'Votre loisire a été ajouter avec succée', 'success');
					this.Lois = {
						titre: ''
					};
					this.getLoisires();
					this.errorsLois = '';
				})
				.catch((error) => {
					if (error.response.status == 422) this.errorsLois = error.response.data.errors;
				});
		},
		getLoisires: function() {
			axios
				.get('/getLoisires/' + idcv)
				.then((respense) => {
					console.log('succes get Loisires');
					this.Loisires = respense.data.Loisires;
					console.log(this.Loisires);
				})
				.catch((error) => {
					console.log('error get Loisires');
				});
		},
		deleteLoisire: function(loisir) {
			Swal.fire({
				title: 'Vous ete sur?',
				text: 'de supprimer cette loisire!',
				type: 'warning',
				showCancelButton: true,
				confirmButtonColor: '#3085d6',
				cancelButtonColor: '#d33',
				confirmButtonText: 'Oui, Supprimer!!!'
			}).then((result) => {
				if (result.value) {
					axios
						.delete('/deleteLoisire/' + this.idLoisire)
						.then((respense) => {
							console.log('succes delete Loisire');
							if (respense.data.etat) {
								var index = this.Loisires.indexOf(loisir);
								this.Loisires.splice(index, 1);
							}
						})
						.catch((error) => {
							console.log('error delete Loisires');
						});
				}
			});
		},
		editLoisire: function(Loisire) {
			this.Lois = Loisire;
		},
		updateLoisire: function(Loisire) {
			axios
				.put('/updateLoisire/' + Loisire.id, Loisire)
				.then((respense) => {
					console.log('succes updtate Loisires', respense.data.etat);
					this.openLoisire = false;
					Swal.fire('Successfly', 'Votre loisire a été modifier avec succée', 'success');
					this.Lois = {
						titre: ''
					};
					this.errorsLois = '';
				})
				.catch((error) => {
					if (error.response.status == 422) this.errorsLois = error.response.data.errors;
				});
		},
		//--------------------------------Langues-------------------------------------
		addLangue: function() {
			axios
				.post('/addLangue/' + idcv, this.Langs)
				.then((respense) => {
					console.log('success add Langues');
					Swal.fire('Successfly', 'Votre langue a été ajouter avec succée', 'success');
					this.getLangues();
					this.Langs = {
						langue: '',
						pourcentage: ''
					};
					this.errorsLang = '';
				})
				.catch((error) => {
					if (error.response.status == 422) this.errorsLang = error.response.data.errors;
				});
		},
		getLangues: function() {
			axios
				.get('/getLangues/' + idcv)
				.then((respense) => {
					console.log('succes get Langues');
					this.Langues = respense.data.Langues;
					console.log(this.Langues);
				})
				.catch((error) => {
					console.log('error get Langues');
				});
		},
		deleteLangue: function(langue) {
			Swal.fire({
				title: 'Vous ete sur?',
				text: 'de supprimer cette langue!',
				type: 'warning',
				showCancelButton: true,
				confirmButtonColor: '#3085d6',
				cancelButtonColor: '#d33',
				confirmButtonText: 'Oui, Supprimer!!!'
			}).then((result) => {
				if (result.value) {
					console.log('icd Langue ===>', this.idLang);
					axios
						.delete('/deleteLangue/' + this.idLang)
						.then((respense) => {
							console.log('succes delete Langue');
							if (respense.data.etat) {
								var index = this.Langues.indexOf(langue);
								this.Langues.splice(index, 1);
							}
						})
						.catch((error) => {
							console.log('error delete Langues');
						});
				}
			});
		},
		editLangue: function(Langue) {
			this.Langs = Langue;
		},
		updateLangue: function(Langue) {
			console.log('----->idLangue', Langue.id);
			axios
				.put('/updateLangue/' + Langue.id, Langue)
				.then((respense) => {
					this.openLangue = false;
					Swal.fire('Successfly', 'Votre langue a été modifier avec succée', 'success');
					console.log('succes updtate Langues');
					this.Langs = {
						langue: '',
						pourcentage: ''
					};
					this.errorsLang = '';
				})
				.catch((error) => {
					if (error.response.status == 422) this.errorsLang = error.response.data.errors;
				});
		},
		//--------------------------------Lien-------------------------------------
		addLien: function() {
			axios
				.post('/addLien/' + idcv, this.Lien)
				.then((respense) => {
					console.log('success add Lien');
					Swal.fire('Successfly', 'Votre Lien a été ajouter avec succée', 'success');
					this.getLiens();
					this.Lien = {
						service: '',
						url: ''
					};
					this.errorsLien = '';
				})
				.catch((error) => {
					if (error.response.status == 422) {
						console.log('error add Lien', error);
						this.errorsLien = error.response.data.errors;
					}
				});
		},
		getLiens: function() {
			axios
				.get('/getLiens/' + idcv)
				.then((respense) => {
					console.log('succes get Liens');
					this.Liens = respense.data.Liens;
					console.log(this.Liens);
				})
				.catch((error) => {
					console.log('error get Liens');
				});
		},
		lienList: function(id) {
			axios
				.get('/getLiens/' + id)
				.then((respense) => {
					console.log('succes get Liens');
					this.Liens = respense.data.Liens;
					console.log(this.Liens);
				})
				.catch((error) => {
					console.log('error get Liens');
				});
		},
		mesLinks: function() {
			axios
				.get('/getLiens/' + idcv)
				.then((respense) => {
					console.log('succes get Liens');
					this.Liens = respense.data.Liens;
					console.log(this.Liens);
				})
				.catch((error) => {
					console.log('error get Liens');
				});
		},
		deleteLien: function(Lien) {
			Swal.fire({
				title: 'Vous ete sur?',
				text: 'de supprimer ce Lien!',
				type: 'warning',
				showCancelButton: true,
				confirmButtonColor: '#3085d6',
				cancelButtonColor: '#d33',
				confirmButtonText: 'Oui, Supprimer!!!'
			}).then((result) => {
				if (result.value) {
					console.log('icd Lien ===>', this.idLien);
					axios
						.delete('/deleteLien/' + this.idLien)
						.then((respense) => {
							console.log('succes delete Lien');
							if (respense.data.etat) {
								var index = this.Liens.indexOf(Lien);
								this.Liens.splice(index, 1);
							}
						})
						.catch((error) => {
							console.log('error delete Liens');
						});
				}
			});
		},
		editLien: function(Lien) {
			this.Lien = Lien;
		},
		updateLien: function(Lien) {
			console.log('----->idLien', Lien.id);
			axios
				.put('/updateLien/' + Lien.id, Lien)
				.then((respense) => {
					this.openLien = false;
					Swal.fire('Successfly', 'Votre Lien a été modifier avec succée', 'success');
					console.log('succes updtate Liens');
					this.Liens = {
						Lien: '',
						pourcentage: ''
					};
					this.errorsLien = '';
				})
				.catch((error) => {
					if (error.response.status == 422) this.errorsLien = error.response.data.errors;
				});
		},
		//--------------------Information personnelle-----------
		getInfo: function() {
			console.log('=====info cv id ', idcv);
			axios
				.get('/getInfos/' + idcv)
				.then((respense) => {
					this.Infos = respense.data.infos;
                    this.Cv = respense.data.cv;
               
					console.log('success get infos', this.Cv.photo);
				})
				.catch((error) => {
					console.log('error get infos');
				});
		},
		updateInfo: function() {
			axios
				.put('/updateInfos', this.Infos)
				.then((respense) => {
					Swal.fire('Successfly', 'Votre information a été modifier avec succée', 'success');

					console.log('succes updtate infos ====', respense.data.etat);
				})
				.catch((error) => {
					if (error.response.status == 422) this.errorsInfo = error.response.data.errors;
					console.log('-----------', this.errorsInfo);
				});
		},
		updateCv: function() {
			axios
				.put('/updateCv/' + idcv, this.Cv)
				.then((respense) => {
					console.log('succes updtate cv', respense.data.etat);
					if (!this.errorsInfo.length && !this.errorsCv.length) {
						this.openInfo = false;
					}
				})
				.catch((error) => {
					if (error.response.status == 422) this.errorsCv = error.response.data.errors;
					console.log('-----------', this.errorsCv);
				});
		},
		deleteCv: function(idc) {
			Swal.fire({
				title: 'Vous ete sur?',
				text: 'de supprimer le cv !',
				type: 'warning',
				showCancelButton: true,
				confirmButtonColor: '#3085d6',
				cancelButtonColor: '#d33',
				confirmButtonText: 'Oui, Supprimer!!!'
			}).then((result) => {
				if (result.value) {
					axios
						.delete('/deleteCv/' + idc)
						.then((respense) => {
							if (respense.data.etat) {
								window.location.href = '';
							}
						})
						.catch((error) => {
							console.log('-----------', error);
						});
				}
			});
		},
		//--------------------------------------
		deleteUser: function(iduser) {
			Swal.fire({
				title: 'Vous ete sur?',
				text: 'de supprimer ce utilisateur !',
				type: 'warning',
				showCancelButton: true,
				confirmButtonColor: '#3085d6',
				cancelButtonColor: '#d33',
				confirmButtonText: 'Oui, Supprimer!!!'
			}).then((result) => {
				if (result.value) {
					axios
						.delete('/deleteUser/' + iduser)
						.then((respense) => {
							if (respense.data.etat) {
								window.location.href = '';
							}
						})
						.catch((error) => {
							console.log('-----------', error);
						});
				}
			});
		},

		editDownload: function() {
			axios
				.put('/editDownload/' + idcv)
				.then((respense) => {
					console.log('succes edit cv', respense.data.etat);
				})
				.catch((error) => {
					console.log('----------- error edit cv');
				});
		}
	},
	mounted: function() {
		this.Notifications();

		this.allTitre();
		this.getPayes();
		this.getInfo();
		this.getCompetences();
		this.getFormations();
		this.getExperiences();
		this.getLoisires();
		this.getLangues();
		this.getLiens();
        this.getComments();
        this.backColor()
        this.textColor()
	}
});
