import React from "react";
import { Routes, Route } from "react-router-dom";
import { Container, Row, Col } from "react-bootstrap";
import styled from "styled-components";
import { Page404, Home } from "../pages";
import { Sidebar } from "../components";

const DefaultLayout = () => {
    return (
        <MainContent>
            <Container>
                <Row>
                    <Col md={4}>
                        <Sidebar />
                    </Col>
                    <Col md={8}>
                        <Routes>
                            <Route path="/" element={<Home />} />
                            <Route path="*" element={<Page404 />} />
                        </Routes>
                    </Col>
                </Row>
            </Container>
        </MainContent>
    );
};

const MainContent = styled.main`
    padding: 50px 0;
`;

export default DefaultLayout;
