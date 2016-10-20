<?php

    class acciones_model extends CI_Model {    

        public function __construct() {
            parent::__construct();
            $this->load->database();
        }

        public function getCuestionarios(){
            return $this->db->select("*")
                            ->from("acciones_cuestionario")
                            ->get()
                            ->result_array(); 
        }

        public function getFotos(){
            return $this->db->select("*")
                            ->from("acciones_foto")
                            ->get()
                            ->result_array(); 
        }

        public function getFotosTiempo(){
            return $this->db->select("*")
                            ->from("acciones_foto_tiempo")
                            ->get()
                            ->result_array(); 
        }

        public function getQuestionaire ($id){

            $questionaire;

            $result = $this->db->get_where('acciones_cuestionario', Array(
                "id" => $id
            ), 1, 0)->row();

            foreach ($result as $k => $v) {
                $questionaire [$k] = $v;
            }

            $questionaire['preguntas'] = $this->db->where('idCuestionario', $id)
                                                  ->select(" *, id as idPregunta")
                                                  ->get('cuestionario_preguntas')
                                                  ->result_array();

            foreach ($questionaire['preguntas'] as $k => $v) {
                $questionaire['preguntas'][$k]['respuestas'] = $this->db->where('idPregunta', $v['id'])
                                                                        ->select(" *, id as idRespuesta")
                                                                        ->get('cuestionario_respuestas')
                                                                        ->result_array();
            }

            return $questionaire;

        }

        public function usuario_cuestionario ($data, $idUsuario, $idCuestionario) {

            $this->db->insert('acciones_cuestionario_usuario', Array(
                "idUsuario" => $idUsuario,
                "idAccion" => $idCuestionario
            ));

            $ID = $this->db->insert_id();

            foreach ($data as $k => $v) {
                $this->db->insert('cuestionario_respuesta', Array(
                    "idCuestionario" => $ID,
                    "idRespuesta" => $v,
                    "idUsuario" => $idUsuario,
                    "idPregunta" => $k
                ));
            }

        }

        public function getPicture ($id) {

            $photography;

            $result = $this->db->get_where('acciones_foto', Array(
                "id" => $id
            ), 1, 0)->row();

            foreach ($result as $k => $v) {
                $photography [$k] = $v;
            }

            return $photography;

        }

        public function usuario_foto ($idUsuario, $idCuestionario, $imagen) {
            $this->db->insert('acciones_foto_usuario', Array(
                "idUsuario" => $idUsuario,
                "idAccion" => $idCuestionario,
                "imagen" => $imagen
            ));
        }

    }