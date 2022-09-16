EXO 1

pla_nom         varchar(255)        nom de la plage
vil_nom         varchar(255)        nom de la ville
pla_lon         decimal(5,2)        longueur de la plage
pla_nat         varchar(255)        nature de la plage (galets, sables...)
pla_dep         varchar(255)        département de la plage
pla_reg         varchar(255)        région de la plage
res_reg_nom     varchar(255)        nom du responsable région
res_reg_pre     varchar(255)        prénom du responsable région
vil_cod_pos     varchar(255)        code postale de la ville
vil_tou         INT                 nombre de touristes annuels de la ville

*******************************************************************************
EXO 2

sta_nom     varchar(255)      nom du stagiaire
sta_pre     varchar(255)      prénom du stagiaire      
sta_sex     varchar(255)      sexe du stagiaire
sta_adr     varchar(255)      adresse du stagiaire
sta_vil     varchar(255)      ville du stagiaire
sta_cod_pos varchar(255)      code postale du satagiaire
sta_nai     date              date de naissance du stagiaire
sta_num     INT               numéro du stagiaire  
for_num     INT               numéro de la formation
for_nom     varchar(255)      nom de la formation  
for_niv     varchar(255)      niveau de la formation
for_tit     booleen           titre professionnel (Oui/Non)
for_deb     date              date du début de la formation
for_fin     date              date de fin de formation
for_dur     INT               durée de la formation

********************************************************************************
EXO 3 

num_che     INT             numéro enregistrement du cheval
dat_che     date            date de naissance du cheval
num_mer_che INT             numéro enregistrement de la mère du cheval
rac_che     varchar(255)    race du cheval
cou_che     varchar(255)    couleur du cheval
sex_che     varchar(255)    sexe du cheval
lie_nai_che varchar(255)    lieu de naissance du cheval
pro_che     varchar(255)    propriétaire(s) du cheval
dat_pro     date            date de propriété du cheval
ent_che     varchar(255)    entraîneur du cheval
dat_ent_che date            date entraînement du cheval
num_pro     INT             numéro identification du propriétaire
rue_pro     varchar(255)    rue du propriétaire
vil_pro     varchar(255)    ville du propriétaire
cod_pos_pro varchar(255)    code postale du propriétaire
vet_che     varchar(255)    vétérinaire du cheval
vac_che     date            vaccination du cheval

