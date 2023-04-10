import React from "react";
import { Container, Row, Col } from "react-bootstrap";
import styled from "styled-components";
import { Link } from "react-router-dom";

const Header = () => {
    return (
        <Wrapper>
            <Container>
                <Row>
                    <Col>
                        <div className="d-flex justify-content-between align-items-center gap-2">
                            <Link to="/" className="fs-2 fw-semibold">
                                Vehicle <span>Rental System</span>
                            </Link>
                        </div>
                    </Col>
                </Row>
            </Container>
        </Wrapper>
    );
};

const Wrapper = styled.header`
    display: block;
    padding: 15px 0;
    box-shadow: 0 0 1.5rem rgba(0 0 0 / 10%);
`;

export default Header;
